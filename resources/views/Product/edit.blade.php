@extends('templates.layout')
@section('content')
    <form action="{{ route('route_product_edit',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Price</label>
            <input type="number" name="price" value="{{$product->price }}" class="form-control">
        </div>
        <div>
    <label for="exampleFormControlTextarea1">Danh mục </label>
        <select class="form-select" name="id_category"  aria-label="Default select example">
        @foreach($category as $st)
            <option value="{{$st->id}}">{{$st->name}}</option>
            @endforeach
        </select>
    </div>
        <div>
        <div>
        <label for="exampleFormControlTextarea1">Sale </label>
    <select class="form-select" name="id_sale"  aria-label="Default select example">
        @foreach($sale as $sl)
            <option value="{{$sl->id}}">{{$sl->promotion}}</option>
  </label>
            @endforeach
        </select>
    </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">description</label>
            <input type="text" name="description" value="{{$product->description }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Ảnh </label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="mat_truoc_preview" src="{{ $product->image?''.Storage::url($product->image):''}}" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                    </div>
                </div>
            </div>
        <button class="btn-success" type="submit">Sửa</button>
    </form>
@endsection