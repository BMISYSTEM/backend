<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class dashboard extends Controller
{
    public function index()
    {
        $rol = Auth::user()->rol;
        $usuario = Auth::user()->id;
        $empresa = Auth::user()->empresas;
        $usuarios = '';
        $clientes = '';
        $aprobado = '';
        $rechazado = '';
        if($rol = 0)
        {
            $usuarios = DB::select("
            select count(u.id) as usuarios from users u 
            inner join empresas em on u.empresas = em.id
            where em.id = ".$empresa." and u.id = ".$usuario."
            ");
            $clientes = DB::select("
            select count(c.id) as clientes from clientes c 
            inner join users u on c.users_id = u.id
            inner join empresas em on u.empresas = em.id
            where u.id = ".$usuario." and em.id =".$empresa."
            ");
            $pendiente = DB::select("
            select count(c.id) as pendientes from clientes c
			inner join estados e on c.estados = e.id
            inner join users u on  c.users_id = u.id
            inner join empresas em on u.empresas = em.id
            where e.pendiente = '1' and em.id = ".$empresa." and u.id = ".$usuario."
            ");
            $aprobado = DB::select("
            select count(c.id) as aprobados from clientes c
            inner join users u on  c.users_id = u.id
            inner join empresas em on u.empresas = em.id
            where c.estados = '2' and em.id = ".$empresa." and u.id = ".$usuario."
            ");
            $rechazado = DB::select("
            select count(c.id) as rechazados from clientes c
            inner join users u on  c.users_id = u.id
            inner join empresas em on u.empresas = em.id
            where c.estados = '3' and em.id = ".$empresa." and u.id = ".$usuario."
            ");
        }else{
            $usuarios = DB::select("
            select count(u.id) as usuarios from users u 
            inner join empresas em on u.empresas = em.id
            where em.id = ".$empresa."
            ");
            $clientes = DB::select("
            select count(c.id) as clientes from clientes c 
            inner join users u on c.users_id = u.id
            inner join empresas em on u.empresas = em.id
            where em.id =".$empresa."
            ");
            $pendiente = DB::select("
            select count(c.id) as pendientes from clientes c
			inner join estados e on c.estados = e.id
            inner join users u on  c.users_id = u.id
            inner join empresas em on u.empresas = em.id
            where e.pendiente = '1' and em.id = ".$empresa."
            ");
            $aprobado = DB::select("
            select count(c.id) as aprobados from clientes c
            inner join users u on  c.users_id = u.id
            inner join empresas em on u.empresas = em.id
            where c.estados = '2' and em.id = ".$empresa."
            ");
            $rechazado = DB::select("
            select count(c.id) as rechazados from clientes c
            inner join users u on  c.users_id = u.id
            inner join empresas em on u.empresas = em.id
            where c.estados = '3' and em.id = ".$empresa."
            ");
        }

        return [
                $usuarios[0],
                $clientes[0],
                $pendiente[0],
                $aprobado[0],
                $rechazado[0]
            ]
            ;

    }
}
