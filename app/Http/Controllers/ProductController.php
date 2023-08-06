<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use Session;
use Storage;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $name = 'listProduct';
        $product = DB::table('product')
            ->whereNull('deleted_at')
            ->get();
        return view('product.index', compact('name', 'product'));
    }
    public function add(Request $request)
    {

        $category = DB::table('category')
            ->whereNull('deleted_at')
            ->get();
        $sale = DB::table('sale')
            ->whereNull('deleted_at')
            ->get();
            // dd($sale);
        if ($request->isMethod('POST')) { //tồn tại phương thức post/
            //nếu như tồn tại file thì sẽ up file lên
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('images', $request->file('image'));
            }
            $product = Product::create($params);
            if ($product->id) {
                Session::flash('success', 'thêm mới thành công ');
                return redirect()->route('product');
            }
        }
        return view('product.add', compact('category','sale'));
    }
    public function edit(Request $request, $id)
    {
        $category = DB::table('category')
        ->whereNull('deleted_at')
        ->get();
    $sale = DB::table('sale')
        ->whereNull('deleted_at')
        ->get();
    
        $product = product::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            //
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
                $resultDL = Storage::delete('/public/' . $product->image);
                if ($resultDL) {
                    $params['image'] = uploadFile('hinh', $request->file('image'));
                }
            } else {
                $params['image'] = $product->image;
            }
            $result = product::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa  thành công sản phẩm');
                return redirect()->route('product', ['id' => $id]);
            }
        }
        return view('product.edit', compact('product','category','sale'));
    }
    public function delete($id)
    {
        // dd($id);
        product::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công sản phẩm có id là' . $id);
        return redirect()->route('product');
    }
}