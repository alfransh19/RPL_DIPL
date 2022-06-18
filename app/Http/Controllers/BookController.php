<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id','asc')->get();
        return view('dashboard.books.index', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|unique:books|max:255',
            'bookImage' => 'required|',
            'synopsis' => 'required',
            'price' => 'required'
        ]);
        Book::create($validation);
        return redirect("/dashboard/books")->with('success', 'Book has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit',[
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'bookImage' => 'required|',
            'synopsis' => 'required',
            'price' => 'required'
        ];

        if($request->title != $book->title){
            $rules['title'] = 'required|unique:books|max:255';
        }

        $validation = $request->validate($rules);

        Book::where('id',$book->id)->update($validation);
        return redirect("/dashboard/books")->with('success', 'Book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);
        return redirect("/dashboard/books")->with('success', 'Book has been deleted!');
    }
}
