<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Books</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bs.min.css')}}">
        <script type="text/javascript" src="{{asset('js/jq.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bs.min.js')}}"></script>
        <style>
        /* Global */


img { max-width:100%; }

a {
    -webkit-transition: all 150ms ease;
	-moz-transition: all 150ms ease;
	-ms-transition: all 150ms ease;
	-o-transition: all 150ms ease;
	transition: all 150ms ease;
	}

a:hover {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)"; /* IE 8 */
    filter: alpha(opacity=50); /* IE7 */
    opacity: 0.6;
    text-decoration: none;
}



body{
    border-top:0;
    background:wheat;

}

.thumbnails li> .fff .caption {
    background:#fff !important;
    padding:10px
}

/* Page Header */
.page-header {
    background: #f9f9f9;
    margin: -30px -40px 40px;
    padding: 20px 40px;
    border-top: 4px solid #ccc;
    color: #999;
    text-transform: uppercase;
}

.page-header h3 {
    line-height: 0.88rem;
    color: #000;
}

ul.thumbnails {
    margin-bottom: 0px;
}



/* Thumbnail Box */
.caption h4 {
    color: #444;
}

.caption p {
    color: #999;
}



/* Carousel Control */
.control-box {
    text-align: right;
    width: 100%;
}
.carousel-control{
    background: #666;
    border: 0px;
    border-radius: 0px;
    display: inline-block;
    font-size: 34px;
    font-weight: 200;
    line-height: 18px;
    opacity: 0.5;
    padding: 4px 10px 0px;
    position: static;
    height: 30px;
    width: 15px;
}



/* Mobile Only */
@media (max-width: 767px) {
    .page-header, .control-box {
        text-align: center;
    }
}
@media (max-width: 479px) {
    .caption {
        word-break: break-all;
    }
}


li { list-style-type:none;}

::selection { background: #ff5e99; color: #FFFFFF; text-shadow: 0; }
::-moz-selection { background: #ff5e99; color: #FFFFFF; }

        </style>
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
                <div class="col-sm-12">
                  <div class="carousel slide" id="myCarousel">
    <div class="carousel-inner">

        @foreach($books as $book)
        <div class="item
        @if($book->id == 1)
        active
        @endif
        ">
                <ul class="thumbnails">

                  @foreach($books as $book)
                    <li class="col-sm-3">
            <div class="fff">
              <div class="thumbnail">
                <img src="{{asset('imgs/book.jpg')}}" alt="">

              </div>
            <div class="caption">
              <h4 class="text-center">{{$book->title}}</h4>
              <p class="text-center">{{$book->description}}</p>
              <a href="{{route('show',['id'=>$book->id])}}" class="btn btn-mini">
                show
              </a>
            </div>
                        </div>
                    </li>
                    @endforeach
          </div>


          @endforeach
    </div>


 <nav>
  <ul class="control-box pager">
    <li><a data-slide="prev" href="#myCarousel" class="">prev</a></li>
    <li><a data-slide="next" href="#myCarousel" class="">next</li>
  </ul>
</nav>
 <!-- /.control-box -->

</div><!-- /#myCarousel -->
                </div>
            </div>
        </div>
    </body>
</html>
