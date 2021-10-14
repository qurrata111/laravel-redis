<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAuthor;
use Illuminate\Support\Facades\Cache;

class BookAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cachedBookAuthors = Cache::remember('bookAuthors', 10*60, function () {
            return BookAuthor::all();
        });

        return $cachedBookAuthors;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cache::forget('bookAuthors');

        request()->validate([
            'book_id' => 'required',
            'author_id' => 'required',
        ]);

        return BookAuthor::create([
            'book_id' => $request->book_id,
            'author_id' => $request->author_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AuthorBook::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookAuthor $bookAuthor)
    {
        Cache::forget('bookAuthors');
        
        return $bookAuthor->update([
            'book_id' => $request->book_id,
            'author_id' => $request->author_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookAuthor $bookAuthor)
    {
        Cache::forget('bookAuthors');
        
        return $bookAuthor->delete();
    }
}
