<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use DB;
use Illuminate\Http\Request;
use Session;
use Storage;

class SaleController extends Controller
{
    public function sale(Request $request){
        $name = 'listSale';
        $sale = DB::table('sale')
        ->whereNull('deleted_at')
        ->get();
        
        return view('sale.index',compact('name','sale'));
    }
    public function add(Request $request) {
        if ($request->isMethod('POST')) { //tồn tại phương thức post/
            //nếu như tồn tại file thì sẽ up file lên
           $params =  $request->except('_token');
      
          $sale = Sale::create($params);
          if ($sale->id) {
              Session::flash('success','thêm mới thành công ');
              return redirect()->route('sale');
          }
        }
        return view('sale.add');
    }
    public function  edit(Request $request,$id) {
        $sale = Sale::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
           $result =Sale::where('id',$id)
               ->update($params);
           if ($result) {
               Session::flash('success','sửa  thành công sale có id là '.$id);
               return redirect()->route('sale',['id'=>$id]);
           }
        }
        return view('sale.edit',compact('sale'));
    }
    public function delete($id) {
        // dd($id);
        Sale::where('id',$id)->delete();
        Session::flash('success','xóa thành công sale có id là'.$id);
        return redirect()->route('sale');
    }
}
