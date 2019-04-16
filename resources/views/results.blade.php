@extends('layouts.app')

@section('content');
  <div class="container">
      <div class="row">
          @foreach($results as $result)
            <div class="col-md-12 text-center">
              @if($result['quantity'] > 0)
                <h1>
                  Title :
                  <span class="text-primary">
                    {{$result['title']}}
                  </span>
                </h1>
                <h2>
                   Auther :
                    <span class="text-success">
                  {{$result['auther']}}
                </span>
                  </h2>

                <h4>
                    Quantity :
                    <b>
                      {{$result['quantity']}}
                    </b>

                </h4>
                <a href="{{route('show',['id'=>$result['id']])}}" class="btn btn-primary">
                  Reserve
                </a>

            </div>
            @endif
            <hr>
          @endforeach
      </div>
  </div>
@endsection
