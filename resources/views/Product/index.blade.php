@extends('templates.layout')
@section('content')
    <h1 class="d-flex justify-content-center text-danger">{{ $name }}</h1>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Hình ảnh</td>
            <td>Name</td>
            <td>Danh mục</td>
            <td>Sale</td>
            <td>price</td>
            <td>Mô tả</td>
            <td>Action</td>
        </tr>
        @foreach($product as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td><img src="{{ $st->image?''.Storage::url($st->image):''}}" style="width: 100px" /></td>

            <td>{{ $st->name }}</td>
            <td>{{ $st->id_category }}</td>
            <td>{{ $st->id_sale }}</td>
            <td>{{ $st->price }}</td>
            <td>{{ $st->description }}</td>
            <td><a href="{{ route('route_product_add',['id'=>$st->id]) }}" class="btn btn-primary" >thêm</a></td>
            <td><a href="{{ route('route_product_edit',['id'=>$st->id]) }}" class="btn btn-info" >Sửa</a></td>
            <td><a href="{{ route('route_product_delete',['id'=>$st->id]) }}" class="btn btn-primary" >Xóa</a></td>
          
        </tr>
        @endforeach
    </table>
@endsection
