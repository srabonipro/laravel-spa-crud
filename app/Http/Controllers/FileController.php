<?php

namespace App\Http\Controllers;

use App\Models\Book;
use PDF;

class FileController extends Controller
{
    public function createPdf()
    {
        $pdf = PDF::loadView('my-pdf');
        return $pdf->download('my-pdf');
    }
}
