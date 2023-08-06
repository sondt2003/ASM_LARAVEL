@extends('templates.layout')
@section('content')
<form action="{{ route('route_sale_add') }}" method="POST">
    @csrf
  
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Nhập % giảm giá</label>
        <input type="text" name="promotion" class="form-control">
    </div>
    <button class="btn btn-danger" type="submit" >Gửi</button>
</form>
@endsection