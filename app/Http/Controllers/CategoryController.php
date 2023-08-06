<?php

namespace App\Http\Controllers;

use App\Models\Category;
use DB;
use Illuminate\Http\Request;
use Session;
use Storage;

class CategoryController extends Controller
{
    public function category(Request $request){
        $name = 'listCategory';
        $category = DB::table('category')
        ->whereNull('deleted_at')
        ->get();
        return view('category.index',compact('name','category'));
    }
    public function add(Request $request) {
        if ($request->isMethod('POST')) { //tồn tại phương thức post/
            //nếu như tồn tại file thì sẽ up file lên
           $params =  $request->except('_token');
           if ($request->hasFile('image') && $request->file('image')->isValid()) {
               $params['image'] = uploadFile('images',$request->file('image'));
           }
          $category = Category::create($params);
          if ($category->id) {
              Session::flash('success','thêm mới thành công ');
              return redirect()->route('category');
          }
        }
        return view('category.add');
    }
    public function  edit(Request $request,$id) {
        //cách 1
//        $category = DB::table('categorys')
//            ->where('id',$id)->first();
        //cách 2
        $category = Category::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            //
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
              $resultDL = Storage::delete('/public/'.$category->image);
              if ($resultDL) {
                  $params['image'] = uploadFile('hinh',$request->file('image'));
              }
            } else {
                $params['image'] = $category->image;
            }
           $result = Category::where('id',$id)
               ->update($params);
           if ($result) {
               Session::flash('success','sửa  thành công danh mục');
               return redirect()->route('category',['id'=>$id]);
           }
        }
        return view('category.edit',compact('category'));
    }
    public function delete($id) {
        // dd($id);
        Category::where('id',$id)->delete();
        Session::flash('success','xóa thành công danh mục có id là'.$id);
        return redirect()->route('category');
    }
}
