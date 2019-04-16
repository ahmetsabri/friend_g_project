@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12 text-center">
                <h1 class="text-success">Done! </h1>
                <h2>your copy is ready for borrowing</h2>
                <a href="{{url('/')}}" class="btn btn-success btn-md">
                  back to home page
                </a>
          </div>
      </div>
  </div>
@endsection
