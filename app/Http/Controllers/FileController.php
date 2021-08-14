<?php

namespace App\Http\Controllers;

use App\Models\Book;
use PDF;

class FileController extends Controller
{
    public function createPdf()
    {
        $books = Book::all();

        $pdf = PDF::loadView('my-pdf', compact('books'));
        return $pdf->download('my-pdf');
    }
}
