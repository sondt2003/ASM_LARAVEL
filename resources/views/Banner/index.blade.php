@extends('templates.layout')
@section('content')
<h1 class="d-flex justify-content-center text-danger">{{ $name }}</h1>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Hình ảnh</td>
            <td>Action</td>
        </tr>
        @foreach($banner as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td><img src="{{ $st->image?''.Storage::url($st->image):''}}" style="width: 100px" /></td>
            <td><a href="{{ route('route_banner_add',['id'=>$st->id]) }}" class="btn btn-warning">Thêm</a></td>
            <td><a href="{{ route('route_banner_edit',['id'=>$st->id]) }}" class="btn btn-danger" >Sửa</a></td>
            <td><a href="{{ route('route_banner_delete',['id'=>$st->id]) }}" class="btn btn-warning">Xóa</a></td>

        </tr>
        @endforeach
    </table>
@endsection
