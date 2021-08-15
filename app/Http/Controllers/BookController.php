<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // all books
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    // add book
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:books,name',
            'author' => 'required'
        ]);

        $book = Book::create($request->all());

        if ($book) {
            return response()->json('The book successfully added');
        } else {
            return response()->json('Something went wrong!!');
        }
    }

    // show book
    public function show(Book $book)
    {
        return response()->json($book);
    }

    // update book
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required'
        ]);

        $book->name = $request->name;
        $book->author = $request->author;
        $updated = $book->update();

        if ($updated) {
            return response()->json('The book successfully updated');
        } else {
            return response()->json('Something went wrong!!');
        }
    }

    // delete book
    public function destroy(Book $book)
    {
        $deleted = $book->delete();

        if ($deleted) {
            return response()->json('The book successfully deleted');
        } else {
            return response()->json('Something went wrong!!');
        }
    }

    // Search
    public function search()
    {
        return Book::when(request('search'), function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('author', 'like', '%' . request('search') . '%')
                ->orWhere('created_at', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->get();
    }
}
