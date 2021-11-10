<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request->has('search')){
            $book = Book::where('judul','LIKE','%'.$request->search.'%')->get();
        }else{
        $book = Book::all();
        }
        return view('book.index', compact('book'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->judul = $request->input('judul');
        $book->pengarang = $request->input('pengarang');
        $book->penerbit = $request->input('penerbit');
        if($request->hasfile('gambar'))
        {
            $file       = $request->file('gambar');
            $extension  = $file->getClientOriginalExtension();
            $filename   = time().'.'.$extension;
            $file->move('uploads/books/', $filename);
            $book->gambar = $filename;
        }
        $book->save();
        return redirect()->back()->with('status','Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->judul = $request->input('judul');
        $book->pengarang = $request->input('pengarang');
        $book->penerbit = $request->input('penerbit');

        if($request->hasfile('gambar'))
        {
            $destination = 'uploads/books/'.$book->gambar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('gambar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/books/', $filename);
            $book->gambar = $filename;
        }

        $book->update();
        return redirect()->back()->with('status','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $destination = 'uploads/books/'.$book->gambar;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $book->delete();
        return redirect()->back()->with('status','Data Berhasil Dihapus');
    }
}
