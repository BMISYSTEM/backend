<?php

namespace App\Http\Controllers;

use App\Http\Requests\Estados;
use App\Models\estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstadoController extends Controller
{
    public function create(Estados $request)
    {
        $estado = $request->validated();
        $empresas = Auth::user()->empresas;
        $creado = estado::create([
            'estado' => $estado['nombre'],
            'color'  => $estado['color'],
            'pendiente'  => $estado['pendiente'],
            'empresas'  => $empresas,
        ]);

        return "se creo correctamente";
    }
    public function index()
    {
        return response()->json(['estados'=>estado::all()]);
    }
}
