@extends('templates.layout')
@section('content')
    <form action="{{ route('route_category_edit',['id'=>$category->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Ảnh </label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="mat_truoc_preview" src="{{ $category->image?''.Storage::url($category->image):''}}" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                        <label for="cmt_truoc"></label><br/>
                    </div>
                </div>
            </div>
        <button class="btn-success" type="submit">Sửa</button>
    </form>
@endsection