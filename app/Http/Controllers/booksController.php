<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Book;
use App\Section;
use App\Author;
use DB;
use App\Http\Requests\BookRequest;

class booksController extends Controller
{

    public function index()
    {
       $books =  DB::table('books')
                   ->join('authors', 'authors.id', '=', 'books.author_id')
                   ->join('sections', 'sections.id', '=', 'books.section_id')
                   ->select('books.id','books.name','books.price','sections.sname','authors.aname')
                   ->paginate(6);
       return View('mainPage', compact('books'));
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
    public function store(BookRequest $request)
    {
       $book=new Book();
       $book->formstore($request);
       return redirect('books');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = DB::table('books')->where('books.id', $id)
                                  ->join('authors', 'authors.id', '=', 'books.author_id')
                                  ->join('sections', 'sections.id', '=', 'books.section_id')
                                  ->select('books.id','books.name','books.price','sections.sname','authors.aname')
                                  ->first();
        return View('books.books-edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $book = Book::findOrFail($id);
      $book->name  = $request->name;
      $book->price = $request->price;
      $sid=DB::table('sections')->where('sname',$request->section)->value('id');
      $aid=DB::table('authors')->where('aname',$request->author)->value('id');
      $book->section_id=$sid;
      $book->author_id=$aid;
      $book->save();
      return redirect('books');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Book::findOrFail($id)->delete();
      return redirect()->back();
    }
}
