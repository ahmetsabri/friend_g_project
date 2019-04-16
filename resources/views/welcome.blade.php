<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Books</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bs.min.css')}}">
        <!-- Styles -->
    </head>
    <body>
      <div class="contianer">

        <div class="">

  <nav class="navbar navbar-default">
  <div class="container-fluid">
  <div class="navbar-header">
  <a class="navbar-brand" href="#">Book</a>
  </div>
  <ul class="nav navbar-nav">
    @if (Route::has('login'))
            @auth
            <li class="nav-item">
                  <a href="{{ url('/home') }}">Home</a>
                </li>

            @else
            <li class="nav-item">

                <a href="{{ route('login') }}">Login</a>
              </li>

                @if (Route::has('register'))
                <li class="nav-item">

                    <a href="{{ route('register') }}">Register</a>
                  </li>

                @endif
            @endauth
    @endif

  </ul>
  </div>
  </nav>
            <div class="container">

                <div class="row">
                  <div class="col-md-12">

                  <h1 class="text-center">
                    Borrow your books now

                  </h1>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  <form  action="{{route('search')}}" method="post">
                    @csrf
                      <div class="form-group">
                        <label></label>
                        <input type="search" name="word" class="form-control"  placeholder="search for book , auther">
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="search">
                      </div>
                  </form>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
