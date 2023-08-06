@extends('templates.layout')
@section('content')
    <form action="{{ route('route_sale_edit',['id'=>$sale->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nhập Phần trăm giảm</label>
            <input type="text" name="promotion" value="{{ $sale->promotion }}" class="form-control">
        </div>
        <button class="btn btn-warning" type="submit">Sửa</button>
    </form>
@endsection