<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book as book;
use App\Reservation as reservation;
class BookController extends Controller
{

    public function index()
    {
      $books = book::latest()->paginate(10);
      return view('admins.dashboard',['books'=>$books]);
    }


    public function store(Request $request)
    {

      $book = new book();

        $request->validate([

          'title'=>'required|string',
          'auther'=>'required|string',
          'description'=>'required|string',
          'quantity'=>'required|numeric',
        ]);

        $book::create([
          'title'=>$request->title,
          'auther'=>$request->auther,
          'description'=>$request->description,
          'quantity'=>$request->quantity,
        ]);

        return redirect()->route('admin_dash');

    }



  public function update(Request $request, $id)
    {

      $book = book::findOrFail($id);


      $request->validate([

        'title'=>'required|string',
        'auther'=>'required|string',
        'description'=>'required|string',
        'quantity'=>'required|numeric',
      ]);

      $book->title = $request->title;
      $book->auther = $request->auther;
      $book->description = $request->description;
      $book->quantity = abs($request->quantity);

      $book->save();

      return redirect()->route('admin_dash');

    }

    public function destroy($id)
    {
      $book = book::findOrFail($id);
      $book->delete();
      return redirect()->route('admin_dash');
    }

    public function search(Request $request )
    {

      $word = $request->word;
        $book = book::where('title','like',"%$word%")
                    ->orWhere('auther','like',"%$word%")
                    ->orWhere('description','like',"$word")
                    ->where('quantity','>',0);


        if ($book->count() > 0 ) {

              $data = [];
              $results = $book->paginate(20);
              $data['results'] = $results;

            return view('results',$data);;
        }

        return redirect()->route('home');
    }

    public function show($id)
    {
        $book = book::findOrFail($id);
        return view('show_book',['book'=>$book]);
    }
    // Book reservation
    public function reserve(Request $request,$id)
    {
      $book = book::findOrFail($id);

      $username  = $request->username;
      $rdate = $request->rdate;
      $bdate = $request->bdate;

      reservation::create([
        'book'=>$book->title,
        'username'=>$username,
        'reciving_date'=>$rdate,
        'back_date'=>$bdate,
      ]);


      $book->quantity -=1;
      $book->save();
    return view('reservation_done');

    }

    public function list_reservations()
    {
        $all_reservations = reservation::latest()->paginate(20);

        return view('admins.all_reservations',['reservations'=>$all_reservations]);
    }
}
