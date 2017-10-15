<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$books = Book::orderBy('name', 'asc')->paginate(10);

        return view('books.index', [
            'books' => $books
        ]);
    }

	public function create()
	{
        return view('books.create');
	}

	public function edit(Book $book)
	{
        return view('books.edit', [
            'book' => $book
        ]);
	}

    public function store(Request $request)
	{
        $this->validate($request, [
            'name'      => 'required|max:255',
			'price'     => 'required|numeric',
			'priority'     => 'required|numeric'
        ]);

        $has_handbook = false;
        $has_activity = false;
        $reading_aloud = false;
        if($request->has_handbook != null)
        {
            $has_handbook = true;
        }
        if($request->has_activity != null)
        {
            $has_activity = true;
        }
        if($request->reading_aloud != null)
        {
            $reading_aloud = true;
        }

        $book = Book::create([
            'name'              =>  $request->name,
            'author'            =>  $request->author,
            'illustrator'       =>  $request->illustrator,
            'translator'        =>  $request->translator,
            'publisher'         =>  $request->publisher,
            'publishing_year'   =>  $request->publishing_year,
            'price'             =>  $request->price,
            'age_group'         =>  $request->age_group,
            'educational_stage' =>  $request->educational_stage,
            'type'              =>  $request->type,
            'illustration'      =>  $request->illustration,
            'priority'          =>  $request->priority,
            'has_handbook'      =>  $has_handbook,
            'has_activity'      =>  $has_activity,
            'reading_aloud'     =>  $reading_aloud,
            'description'       =>  $request->description
        ]);

        return redirect('/books');
    }

	public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
			'price'     => 'required|numeric',
			'priority'     => 'required|numeric'
        ]);

        $has_handbook = false;
        $has_activity = false;
        $reading_aloud = false;
        if($request->has_handbook != null)
        {
            $has_handbook = true;
        }
        if($request->has_activity != null)
        {
            $has_activity = true;
        }
        if($request->reading_aloud != null)
        {
            $reading_aloud = true;
        }

        $book->update([
            'name'              =>  $request->name,
            'author'            =>  $request->author,
            'illustrator'       =>  $request->illustrator,
            'translator'        =>  $request->translator,
            'publisher'         =>  $request->publisher,
            'publishing_year'   =>  $request->publishing_year,
            'price'             =>  $request->price,
            'age_group'         =>  $request->age_group,
            'educational_stage' =>  $request->educational_stage,
            'type'              =>  $request->type,
            'illustration'      =>  $request->illustration,
            'priority'          =>  $request->priority,
            'has_handbook'      =>  $has_handbook,
            'has_activity'      =>  $has_activity,
            'reading_aloud'     =>  $reading_aloud,
            'description'       =>  $request->description
        ]);

        return redirect('/books');
    }

	public function destroy(Request $request, Book $book)
    {
        $book->delete();

        return redirect('/books');
	}

}
