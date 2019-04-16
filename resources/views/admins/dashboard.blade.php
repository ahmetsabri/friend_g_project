@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1 class="text-center">Admin Dashboard</h1>
@stop

@section('content')

    <p class="text-center">Welcome to this beautiful admin panel.<p>
      @if ($errors->any())
      <h1 class="text-danger"> error while createing : </h1>
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a new book</h4>
        </div>

        <div class="modal-body">
          <form method="POST" action="{{route('addbook')}}">
             @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="title" required>
            </div>
            <div class="form-group">
              <label for="auther">Auther</label>
              <input type="text" class="form-control" name="auther" id="auther" placeholder="auther" required>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" id="description" placeholder="description" required>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity" required>
            </div>
            <div class="text-center">
              <input value="save" type="submit" class="btn btn-success">
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">

      <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">
        add a book
      </button>

    </div>
    <br>
    </div>
    <br>
      <div class="row">
      <div class="col-md-10">
    <table class="table table-bordered table-hover">

      <thead>

      <tr class="text-center">
        <th class="text-center">book id</th>
        <th class="text-center">title</th>
        <th class="text-center">auther</th>
        <th class="text-center">description</th>
        <th class="text-center">quantity</th>
        <th class="text-center">Edit</th>
        <th class="text-center">Delete</th>
      </tr>
      @foreach($books as $book)
        <tr>

          <td>{{$book['id']}}</td>
          <td>{{$book['title']}}</td>
          <td>{{$book['auther']}}</td>
          <td>{{$book['description']}}</td>
          <td>{{$book['quantity']}}</td>
          <td class="text-center">

                  <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModal-{{$book['id']}}">
                    Edit
                  </button>
            <div class="modal fade" id="myModal-{{$book['id']}}" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add a new book</h4>
                </div>

                <div class="modal-body">
                  <form method="POST" action="{{route('editbook',['id'=>$book['id']])}}">
                     @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input value="{{$book['title']}}" type="text" class="form-control" name="title" id="title" placeholder="title" required>
                    </div>
                    <div class="form-group">
                      <label for="auther">Auther</label>
                      <input value="{{$book['auther']}}" type="text" class="form-control" name="auther" id="auther" placeholder="auther" required>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input value="{{$book['description']}}" type="text" class="form-control" name="description" id="description" placeholder="description" required>
                    </div>
                    <div class="form-group">
                      <label for="quantity">Quantity</label>
                      <input value="{{$book['quantity']}}" type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity" required>
                    </div>
                    <div class="text-center">
                      <input value="save" type="submit" class="btn btn-success">
                    </div>
                  </form>
                </div>
          </td>
          <td>
            <a onclick="deleteBook({{$book['id']}})" class="btn btn-danger"> delete</a>
          </td>
        </tr>

      @endforeach
    </thead>
    </table>
    <div class="text-center">

    {{ $books->links() }}
  </div>
  </div>
</div>
  </div>
@stop

@section('css')
<style>
td{
  text-align: center;
}
</style>
<link rel="stylesheet" href="{{asset('css/bs.min.css')}}">

@stop

@section('js')
<script type="text/javascript" src="{{asset('js/jq.min.js')}}">
</script>
<script type="text/javascript" src="{{asset('js/bs.min.js')}}">
</script>
@stop
<script>

  function deleteBook(id){
    var sure = confirm ('sure ?');

    if (sure) {
      window.location.href = "/admin/delete-book/"+id;
    }
  }
</script>
