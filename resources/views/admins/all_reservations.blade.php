@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1 class="text-center">Admin Dashboard</h1>
@stop

@section('content')

    <div class="text-center">
        <h1>all reservations</h1>
    </div>
    <table class="table table-hover table-bordered">
          <thead>
            <tr class="text-center">
              <th class="text-center">name</th>
              <th class="text-center">book</th>
              <th class="text-center">receving date</th>
              <th class="text-center">back date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reservations as $reservation)
              <tr>
                <td>{{$reservation['username']}}</td>
                <td>{{$reservation['book']}}</td>
                <td>{{$reservation['reciving_date']}}</td>
                <td>{{$reservation['back_date']}}</td>
              </tr>
            @endforeach
          </tbody>
    </table>

    <div class="text-center">
    {{ $reservations->links() }}
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
