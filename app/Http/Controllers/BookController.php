<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
   
    public function index()
    {     $users = User::all();
        $books=Book::all();
        return view('books.index', compact('books','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BookCategory::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:book_categories,id',
            'is_available' => 'required|boolean',
            'imag' => 'required',

        ]);

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'is_available' => $request->is_available,
            'user_id' => null,  
            'imag' => $request->imag,
        ]);

        return redirect()->route('books.index')->with('success', __('puplic.book_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
    $categories = BookCategory::all(); 
    return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:book_categories,id',
            'is_available' => 'required|boolean',
            'imag' => 'required',
        ]);
    
        $book = Book::findOrFail($id);
        $book->update($request->all());
    
        return redirect()->route('books.index')->with('success', __('puplic.book_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
    
        return redirect()->back()->with('success', __('puplic.book_deleted'));
    }
    public function toggleAvailability(Request $request, $id)
{

    $book=Book::findOrFail($id);
    $book->is_available = !$book->is_available;
    
    if (!$book->is_available) {
        $book->user_id = $request->input('user_id');
    } else {
        $book->user_id = null;
    }

    $book->save();

    return redirect()->back()->with('success', __('puplic.status_updated'));
}
public function availableBooks()
{
    $books = Book::where('is_available', true)->get();
    return view('books.available', compact('books'));
}
// BookController.php

public function borrow(Book $book)
{
    if ($book->is_available) {
        $book->is_available = false;
        $book->user_id = Auth::id(); 
        $book->save();

        return redirect()->back()->with('success', __('puplic.aa'));
    }

    return redirect()->back()->with('error', __('puplic.naa'));
}

}
