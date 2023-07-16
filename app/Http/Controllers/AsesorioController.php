<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsesoriosRequest;
use App\Models\asesorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsesorioController extends Controller
{
    public function create(AsesoriosRequest $request)
    {
        $asesorios = $request->validated();
        $foto1 ='';
        $foto2 ='';
        $foto3 ='';
        
        if($_FILES){
            if (isset($_FILES['foto1'])) {
                $foto1 =$_FILES['foto1']['name']['archivo'];
                // $ruta = $_SERVER['DOCUMENT_ROOT']."";
                $ruta = $_SERVER['DOCUMENT_ROOT']."/storage/asesorios/";
                $archivotmp = $_FILES['foto1']['tmp_name']['archivo'];
                // $nombreURL = $archivotmp->store('imagenes');
                $datos = (move_uploaded_file($archivotmp,$ruta.$foto1));
                
                // $archivotmp->store();
            }
            if (isset($_FILES['foto2']) ) {
                $foto2 =$_FILES['foto2']['name']['archivo'];
                // $ruta = $_SERVER['DOCUMENT_ROOT']."";
                $ruta = $_SERVER['DOCUMENT_ROOT']."/storage/asesorios/";
                $archivotmp = $_FILES['foto2']['tmp_name']['archivo'];
                // $nombreURL = $archivotmp->store('imagenes');
                $datos = (move_uploaded_file($archivotmp,$ruta.$foto2));
                
                // $archivotmp->store();
            }
            if (isset($_FILES['foto3'])) {
                $foto3 =$_FILES['foto3']['name']['archivo'];
                // $ruta = $_SERVER['DOCUMENT_ROOT']."";
                $ruta = $_SERVER['DOCUMENT_ROOT']."/storage/asesorios/";
                $archivotmp = $_FILES['foto3']['tmp_name']['archivo'];
                // $nombreURL = $archivotmp->store('imagenes');
                $datos = (move_uploaded_file($archivotmp,$ruta.$foto3));
                
                // $archivotmp->store();
            }
        }


        $asesorio = asesorio::create(
            [
            'nombre'=> $asesorios['nombre'],
            'marcas'=> $asesorios['marcas'],
            'estados'=> $asesorios['estados'],
            'descripcion'=> $asesorios['descripcion'],
            'valor'=> $asesorios['valor'],
            'foto1'=>$foto1,
            'foto2'=>$foto2,
            'foto3'=>$foto3,
            ]
        );
        return 'se creo de forma correcta';
    }
    public function index()
    {

        $vista= DB::select('select a.id,a.nombre,a.descripcion,a.valor,a.foto1,a.foto2,a.foto3,m.nombre as marca ,m.id as marca_id,e.estado,e.id as estado_id from asesorios a
        inner join marcas m on m.id = a.marcas
        inner join estados e on e.id = a.estados');
        return response()->json($vista);
    }
}
