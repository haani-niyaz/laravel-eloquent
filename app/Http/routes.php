<?php

use App\Book;


/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('create_book',function(){
	$book = new Book;
	$book->title = 'My Second Boook';
	$book->pages_count = '200';
	$book->price = 10.5;
	$book->description = 'A not very original story';
	$book->author_id = 1;
	$book->publisher_id = 1;
	$book->save();
});



/**
* Chain as many queries
* Chained conditions are equal to COND1 AND COND2
* 'get' returns a collection of instances
* 'first' returns a single instance
*/

Route::get('where',function(){
	
	 dd(Book::where('pages_count','=',200)
					 ->Where('price','=',10.5)
					 ->get());
});


/**
* Chain as many queries
* Chained conditions are equal to COND1 AND COND2
*/

Route::get('orWhere',function(){

	 dd(Book::where('pages_count','=',200)
					 ->orWhere('price','=',10.5)
					 ->get());

});


/**
* Closures: http://culttt.com/2013/03/25/what-are-php-lambdas-and-closures/
* Find all books with more than 120 pages AND 'Book' in the title
* Or
* Find all bookx with less than 200 pages AND an empty desc
*/

Route::get('complexWhere',function(){
	
	$result = Book::where(function($query){
		$query->where('pages_count','>',120)
					->where('title','LIKE','%Book%');
				})->orWhere(function($query){
					$query->where('pages_count','<',200)
								->where('description','=','');	
				})->get();

	dd($result);
	
});


/**
* Find books between 100 and 200 pages
*/

Route::get('whereBetween', function() {
     dd(Book::whereBetween('pages_count',[100,200])->get());
});


/**
* Find books with titles
*/

Route::get('whereIn', function() {
    dd(Book::whereIn('title',['My First Book', 'My Second Book'])->get());
});


/**
* Magic where
* Using PHP Magic methos a dynamically create where methods on table columns
* Only valid when checking equal values
*/

Route::get('magicWhere', function() {
    dd(Book::wherePagesCount(230)->first());
});



/**
* Query scopes
* Defined in Book model
*/

Route::get('cheap',function(){
	dd(Book::cheap(11)->get());
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
