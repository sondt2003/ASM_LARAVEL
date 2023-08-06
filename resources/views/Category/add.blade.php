@extends('templates.layout')
@section('content')
    <form action="{{ route('route_category_add') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    
        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Ảnh </label>
            <div class="input-group mb-3">
  <input type="file" class="form-control" name="image" id="inputGroupFile01">
</div>
        </div>
        <button class="btn-success" type="submit">Gửi</button>
    </form>
@endsection