<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Book;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{
    public function createPdf()
    {
        $books = Book::all();
        $pdf = PDF::loadView('my-pdf', compact('books'));
        return $pdf->download('my-pdf');
    }

    public function createExcel()
    {
        return Excel::download(new BooksExport, 'book_list_' . date('d_m_Y') . '.xlsx');
    }

    public function createCsv()
    {
        return Excel::download(new BooksExport, 'book_list_' . date('d_m_Y') . '.csv');
    }
}
