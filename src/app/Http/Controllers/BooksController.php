<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
#use DB;
use Illuminate\Support\Facades\DB;
#I will need to add code like 'use App\Models\Book;' so that this...
#...controller can use the model (Book.php) of the books table and the...
#...model's associated functions/methods. This way, this controller could...
#...for example create a CSV file by using the model and its method to...
#...select all of the rows in the table and turn them into a CSV file.

class BooksController extends Controller
{
    //
    function books() {
        $books = Book::all(); #books in red is the table in my db
        return view('welcome', ['books'=>$books]);
    }
    function deleteBook(Request $request) {
        try {
            $id = $request->id;
            DB::table('books')
                ->where('id', '=', $id)->delete();
            return redirect('/');
        }catch(\Illuminate\Database\QueryException $ex){ 
            toastr()->error('Book couldn"t be deleted!');
            return redirect('/');
        }

    }
}
