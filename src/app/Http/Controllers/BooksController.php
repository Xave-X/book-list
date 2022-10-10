<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
#use DB;
use Excel;
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

    function booksByAuthor() {
        $books = Book::orderBy('Author', 'ASC')->get();
        return view('welcome', ['books'=>$books]);
    }

    function booksByTitle() {
        $books = Book::orderBy('Title', 'ASC')->get();
        return view('welcome', ['books'=>$books]);
    }

    function search(Request $request){
        try{
            $q = $request->get('q');
            $books = DB::select('select * from books where Title  = ?',[$q]);
            return view('welcome', ['books'=>$books]);

        } catch(\Illuminate\Database\QueryException $ex){ 
            toastr()->error('Search unsuccessful!');
            return redirect('/');
        }
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

    function addBookPage() {
        return view('addBook');
    }

    function export() {
        return view('export');
    }

    function addBook(Request $request){
        try{
            $title = $request->get('bookTitle');
            $author = $request->get('bookAuthor');
            DB::table('books')->insert(
                ['Title' => $title, 'Author' => $author]
            );
            return redirect('/');
        } catch(\Illuminate\Database\QueryException $ex){ 
            toastr()->error('New book could not be added!');
            return redirect('/');
        }
    }

    function editBookPage(Request $request) {
        try {
            $id = $request->id;###
            $book = DB::select('select * from books where id = ?',[$id]);
            return view('editBook', ['book'=>$book]);
        }catch(\Illuminate\Database\QueryException $ex){ 
            toastr()->error('Book couldn"t be edited!');
            return redirect('/');
        }

    }

    function editBook(Request $request){
        try{
            $author = $request->get('bookAuthor');
            $id = $request->get('bookId');

            DB::table('books')
                ->where('id', $id)
                ->update(['Author' => $author]);

            return redirect('/');

        } catch(\Illuminate\Database\QueryException $ex){ 
            toastr()->error('Book could not be updated!');
            return redirect('/');
        }
    }





    public function exportCSVTA(){

        $books = Book::all();
        return response()->xml($books);
  
      }





}
