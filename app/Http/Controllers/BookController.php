<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',       
            'penulis' => 'required|string|max:255',     
            'penerbit' => 'required|string|max:255',   
            'tahun_terbit' => 'required|integer|min:1945', 
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',      
            'penulis' => 'required|string|max:255',     
            'penerbit' => 'required|string|max:255',    
            'tahun_terbit' => 'required|integer|min:1945', 
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil dihapus!');
    }
}
