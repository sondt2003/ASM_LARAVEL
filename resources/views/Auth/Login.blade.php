@extends('templates.layout')
@section('content')
<form action="{{ route('login') }}" method="POST" >
@csrf
    <div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded">
      <h2
        class="rounded-4 bg-danger d-flex justify-content-center text-white mt-2"
      >
      </h2>
      <div class="mb-3">
        <label id="email" for="exampleFormControlInput1" class="form-label "
          >Email</label
        >
        <input
          name="email"
          type="email"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="ok@gmai.com"
        />
      </div>
      <div class="mb-3">
        <label id="password" for="exampleFormControlInput1" class="form-label"
          >password</label
        >
        <input
        name = "password"
          type="password"
          class="form-control"
          id="exampleFormControlInput1"
        />
      </div>
  
      <div class="d-flex justify-content-center mt-3 mb-5">
        <div class="d-grid gap-2 d-md-block">
          <button class="btn btn-primary" ng-click="onSubmitforms()" type="submit">Đăng nhập</button>
        </div>
      </div>
    </div>
  </form>
  @endsection