@extends('templates.layout')
@section('content')
    <h1 class="d-flex justify-content-center text-danger">{{ $name }}</h1>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Hình ảnh</td>
            <td>Action</td>
        </tr>
        @foreach($category as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td>{{ $st->name }}</td>
            <td><img src="{{ $st->image?''.Storage::url($st->image):''}}" style="width: 100px" /></td>
            <td><a href="{{ route('route_category_add',['id'=>$st->id]) }}" class="btn btn-warning">thêm</a></td>
            <td><a href="{{ route('route_category_edit',['id'=>$st->id]) }}" class="btn btn-danger" >Sửa</a></td>
            <td><a href="{{ route('route_category_delete',['id'=>$st->id]) }}" class="btn btn-warning">Xóa</a></td>

        </tr>
        @endforeach
    </table>
@endsection
