<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\BookLog;

class BookController extends Controller
{
    public function index(Request $request){

        $code = $request->get('code');
        $author = $request->get('author');
        $title = $request->get('title');
        $category = $request->get('category_id');
        $date = $request->get('date_publication');

        $book = Book::code($code)->author($author)->title($title)->category($category)->date($date)->paginate(10);
        return response()->json($book,200);
    }

    public function store(Request $request){

        if(!$request->input('author') || !$request->input('title') || !$request->input('category_id')){
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Missing data author, title, category_id'])],422);
        }

        $book = Book::create($request->all());
        return response()->json($book,201);
    }

    public function show(Book $book){
        $newBook = Book::join('category','book.category_id', '=', 'category.id')
             ->select('book.*','category.name as category')
             ->where('book.id',$book->id)
             ->first();
        return response()->json($newBook,200);     
    }

    public function update(Request $request, Book $book){
        
        if(isset($request->status)){    
            if($request->status == "inactive" && isset($request->name)){
                $bookLog = new BookLog();
                $bookLog->book_id = $book->id;
                $bookLog->name = $request->name;  
                $bookLog->date_borrowed = NOW();
                $bookLog->return_date = $request->return_date;
                $bookLog->save();
            }

            $book->update(['status' => $request->status]);
            return response()->json($book,200);
        }
        $book->update($request->all());
        return response()->json($book,200);
    }

    public function delete(Book $book){
        $book->delete();
        return response()->json(['success'=>true,'message'=>'Book Deleted.'],200);
    }
}
