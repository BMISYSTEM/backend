<?php

namespace App\Http\Controllers;

use App\Http\Requests\Nota;
use App\Models\cliente;
use App\Models\notas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotasController extends Controller
{
    public function create(Nota $request)
    {
        $nota = $request->validated();
        $users = Auth::user()->id;
        $empresa = Auth::user()->empresas;
        $insert = notas::create([
            'comentario' => $nota['comentario'],
            'proximo_seguimiento' => $nota['proximo'].' '.$nota['hora'],
            'hora' => $nota['hora'],
            'estados' => $nota['estado'],
            'clientes' => $nota['cliente'],
            'users'=>$users,
            'empresas'=>$empresa
        ]);
        $estado = $request['estado'];
        $cliente = $request['cliente'];
        $update = cliente::where('id',$cliente)->get();
        $update->toQuery()->update([
            'estados' => $estado
        ]);
        
        return "se guardo la nota de forma correcta";
    }
    public function index()
    {

        $vista = DB::select('
        select
        n.id,n.comentario,n.proximo_seguimiento,
        e.id as id_estado,e.estado,
        u.id as id_users,u.name as nombre_usuario,
        n.clientes,
        e.color as color,
        u.img  as foto
        from notas n
        inner join estados e on e.id = n.estados
        inner join users u on  u.id = n.users
        inner join clientes c on c.id = n.clientes
        ORDER BY  n.created_at DESC
        ');
        return response()->json($vista);
    }
}
