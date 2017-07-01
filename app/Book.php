<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
 public function section()
 {
	 return $this->belongsTo('App\Section');
 }

  public function author()
 {
	 return $this->belongsTo('App\Author');
 }


    public function formstore($request)
{
	
$name=$request->input('name');

$price=$request->input('price');

$section=$request->input('section');

$author=$request->input('author');

$sid=DB::table('sections')->where('sname',$section)->value('id');
$aid=DB::table('authors')->where('aname',$author)->value('id');
 
   //     $file = array('image' => $request->file('image'));
   //     $destinationPath = 'images/'; // upload path
     //   $extension = $request->file('image')->getClientOriginalExtension(); 
     //   $fileName = rand(11111,99999).'.'.$extension; // renaming image
     //  $request->file('image')->move($destinationPath, $fileName);
   


      



	$books= new Book();
	$books->name=$name;
	$books->price=$price;
	$books->section_id=$sid;
	$books->author_id=$aid;
	$books->save();
 
 }
}
