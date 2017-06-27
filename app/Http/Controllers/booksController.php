<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Book;
use App\Section;
use App\Author;
use DB;

class booksController extends Controller
{
   
    public function index()
    {

     $books =DB::table('books')
     ->join('authors', 'authors.id', '=', 'books.author_id')
       ->join('sections', 'sections.id', '=', 'books.section_id')
       ->select('books.id','books.name','books.price','sections.sname','authors.aname')
       ->simplePaginate(6);
       
            return View('mainPage')
           ->with('books', $books);   

         /*  $books=Book::all();    
            $sections=Section::all();   
             $authors=Author::all();  
              return View('mainPage')
           ->with('books', $books)
           ->with('sections', $sections)
           ->with('authors', $authors) ; */
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
            $validator = Validator::make($request->all(), [
            'name' => 'required|unique:books',
            'price' => 'required',
             'author' => 'required',
              'section' => 'required',
         
        ]);

  if ($validator->fails()) {
            return redirect('books.books-new')
                        ->withErrors($validator);               
        }
        else{

          //    $section=$request->input('section');
           //    $author=$request->input('author');
     
     
             $book=new Book(); 
           $book->formstore($request);
           return redirect('books');
       }
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
        $book=Book::find($id);

    $secid= $book->section_id;
    $authid= $book->author_id;
$sname=DB::table('sections')->where('id',$secid)->value('sname');
$aname=DB::table('authors')->where('id',$authid)->value('aname');

        return View('books.books-edit')
           ->with('book', $book)
           ->with('sname', $sname)
           ->with('aname', $aname);
         
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
              $book = Book::find($id);
            $book->name  = $request->Input('name');     
            $book->price = $request->Input('price');

$section=$request->input('section');

$author=$request->input('author');

$sid=DB::table('sections')->where('sname',$section)->value('id');
$aid=DB::table('authors')->where('aname',$author)->value('id');

         $book->section_id=$sid;
         $book->author_id=$aid;
            $book->save();
            // redirect
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
          $book = Book::find($id);

    $book->delete();
    return redirect('books');
    }
}
