@extends('templates.layout')
@section('content')
<form action="{{ route('route_product_add') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Price</label>
        <input type="number" name="price" class="form-control">
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
    <label for="exampleFormControlTextarea1">Sale </label>
    <select class="form-select" name="id_sale"  aria-label="Default select example">
        @foreach($sale as $sl)
            <option value="{{$sl->id}}">{{$sl->promotion}}</option>
  </label>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">description</label>
        <input type="text" name="description" class="form-control">
    </div>
    <div class="form-group">
        <label class="col-md-3 col-sm-4 control-label">Ảnh </label>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image"
                id="inputGroupFile01">
        </div>
    </div>
    <button class="btn-success" type="submit">Gửi</button>
</form>
@endsection