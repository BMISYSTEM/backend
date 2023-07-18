<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudCredito extends Controller
{
    public function create(Request $request)
    {
        return response()->json($request);
    }
    public function view()
    {
        $pdf = Pdf::loadView('solicitud', []);
        // $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
}
