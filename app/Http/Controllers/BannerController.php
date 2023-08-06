<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Session;
use Storage;
use DB;

class BannerController extends Controller
{
    public function banner(Request $request){
        $name = 'listBanner';
        $banner = DB::table('banner')
        ->whereNull('deleted_at')
        ->get();
        
        return view('banner.index',compact('name','banner'));
    }
    public function add(Request $request) {
        if ($request->isMethod('POST')) { //tồn tại phương thức post/
            //nếu như tồn tại file thì sẽ up file lên
           $params =  $request->except('_token');
           if ($request->hasFile('image') && $request->file('image')->isValid()) {
               $params['image'] = uploadFile('images',$request->file('image'));
           }
          $banner = Banner::create($params);
          if ($banner->id) {
              Session::flash('success','thêm mới thành công ');
              return redirect()->route('banner');
          }
        }
        return view('banner.add');
    }
    public function  edit(Request $request,$id) {
        //cách 1
//        $banner = DB::table('banners')
//            ->where('id',$id)->first();
        //cách 2
        $banner = Banner::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            //
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
              $resultDL = Storage::delete('/public/'.$banner->image);
              if ($resultDL) {
                  $params['image'] = uploadFile('hinh',$request->file('image'));
              }
            } else {
                $params['image'] = $banner->image;
            }
           $result = Banner::where('id',$id)
               ->update($params);
           if ($result) {
               Session::flash('success','sửa  thành công danh mục');
               return redirect()->route('banner',['id'=>$id]);
           }
        }
        return view('banner.edit',compact('banner'));
    }
    public function delete($id) {
        // dd($id);
        banner::where('id',$id)->delete();
        Session::flash('success','xóa thành công danh mục có id là'.$id);
        return redirect()->route('banner');
    }
}
