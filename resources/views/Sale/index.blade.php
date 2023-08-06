@extends('templates.layout')
@section('content')
    <h1 class="d-flex justify-content-center text-danger">{{ $name }}</h1>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Giảm giá</td>
            <td>Action</td>
        </tr>
        @foreach($sale as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td>{{ $st->promotion }}</td>
            <td><a href="{{ route('route_sale_add',['id'=>$st->id]) }}" class="btn btn-primary">Thêm</a></td>
            <td><a href="{{ route('route_sale_delete',['id'=>$st->id]) }}" class="btn btn-primary">Xóa</a></td>
            <td><a href="{{ route('route_sale_edit',['id'=>$st->id]) }}" class="btn btn-info">Sửa</a></td>
        </tr>
        @endforeach
    </table>
@endsection
