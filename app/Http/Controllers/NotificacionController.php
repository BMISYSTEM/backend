<?php

namespace App\Http\Controllers;

use App\Models\notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    public function index()
    {
        $usuario = Auth()->user()->id;
        $mensajes = notificacion::where('user_id',$usuario)->get();
        return $mensajes;
    }
    public function alertas()
    {
        $empresa = Auth::user()->empresas;
        $user=Auth::user()->id;
        $vista = DB::select("
        select 
        c.id as cliente_id, 
        c.nombre, 
        c.apellido, 
        c.cedula, 
        c.date, 
        c.telefono,
        c.email,
        c.estados,
        c.users_id,
         e.id as estados_id, e.estado, e.created_at, e.updated_at,
         t.comentario,t.fecha as fecha
         from clientes c 
         inner join users u on c.users_id = u.id
         inner join empresas em on u.empresas = em.id
        inner join estados e on e.id = c.estados
        left join 
        (select max(n.fecha) as fecha,clientes,max(comentario) as comentario from (select proximo_seguimiento fecha,clientes,comentario from notas GROUP BY clientes,proximo_seguimiento,comentario)as n GROUP BY n.clientes) as t  on t.clientes = c.id 
        where DATE(t.fecha) <= DATE(CURDATE()) and em.id = '".$empresa."' and u.id = '".$user."'
        group by c.id,t.comentario,t.clientes,c.nombre,c.apellido,c.cedula,c.date,c.telefono,c.email,c.estados,c.users_id,e.id,e.estado,e.created_at,e.updated_at,t.fecha 
        ORDER BY  fecha DESC");
        return response()->json($vista);
    }
}
