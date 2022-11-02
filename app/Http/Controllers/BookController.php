<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::OrderBy('updated_at', 'DESC')->paginate(10);  
        // dd($books);
        return view('pages.home', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|min:5|string|max:180',
            'description' => 'required|min:20|max:1000|string',
            'url_img' => 'required|image|mimes:png,jpg,jpeg|max:2000',
            'price' => 'string',
            'author' => 'required',
            'nombre_pages' => 'required',
        ]);

        $validateImg = $request->file('url_img')->store('books');

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'url_img' => $validateImg,
            'price' => $request->price,
            'author' => $request->author,
            'nombre_pages' => $request->nombre_pages,
            'created_at' => now()
        ]);

        return redirect()
        ->route('home')
        ->with('status', 'Le livre a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $books)
    {
        return view('pages.show', compact('book'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $books)
    {
        return view('pages.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if($request->has('is_published')){
            $published = 1;
        }

        // verify is file exist
        // if file exist, to delete previous img
        if($request->hasFile('url_img')){
            // delete previous img 
            Storage::delete($book->url_img);
            // store the new img 
            $book->url_img = $request->file('url_img')->store('books');
        }

        $request->validate([
            'title' => 'required|min:5|string|max:180',
            'description' => 'required|min:20|max:350|string',
            'url_img' => 'required|sometimes',
            'price' => 'required',
            'author' => 'required',
            'nombre_pages' => 'required',
        ]);

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'url_img' => $book->url_img,
            'price' => $request->price,
            'author' => $request->author,
            'nombre_pages' => $request->nombre_pages,
            'updated_at' => now()
        ]);

        return redirect()
        ->route('home')
        ->with('status', 'Le livre a bien été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
