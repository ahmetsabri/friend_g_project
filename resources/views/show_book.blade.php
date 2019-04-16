@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6  col-md-offset-3">
          @if($book['quantity'] > 0)
            <h1>
              Title :
              <span class="text-primary">
                {{$book['title']}}
              </span>
            </h1>
            <h2>
               Auther :
                <span class="text-success">
              {{$book['auther']}}
            </span>
              </h2>
              <p>
                <b>About book </b> : {{$book['description']}}

              </p>
            <h4>
                Quantity :
                <b>
                  {{$book['quantity']}}
                </b>

            </h4>
              <form method="post" action="{{route('reserve_book',['id'=>$book['id']])}}">
                  @csrf
                  <div class="form-group">
                    <label>name : </label>
                    <input type="text" class="form-control" required  name="username">
                  </div>
                  <div class="form-group">
                    <label>reciving date : </label>
                    <input type="date" class="form-control" required  name="rdate">
                  </div>
                  <div class="form-group">
                    <label>back date : </label>
                    <input type="date" class="form-control" required  name="bdate">
                  </div>

                <input type="submit" class="btn btn-success" value="confirm">
              </form>

        </div>
        @endif
        </div>
    </div>
</div>
@endsection
