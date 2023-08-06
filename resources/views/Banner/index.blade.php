@extends('templates.layout')
@section('content')
<h1>{{ $name }}</h1>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Hình ảnh</td>
            <td>Action</td>
        </tr>
        @foreach($banner as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td><img src="{{ $st->image?''.Storage::url($st->image):''}}" style="width: 100px" /></td>
            <td><a href="{{ route('route_banner_delete',['id'=>$st->id]) }}">Xóa</a></td>
            <td><a href="{{ route('route_banner_edit',['id'=>$st->id]) }}">Sửa</a></td>
        </tr>
        @endforeach
    </table>
@endsection
