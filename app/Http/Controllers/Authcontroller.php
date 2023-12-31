<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permisos;
use App\Http\Requests\login;
use App\Http\Requests\users;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Storage;

class Authcontroller extends Controller
{
    // ingreso
    public function login (login $request)
    {
             $data = $request->validated();
             //revisar password
             if (!Auth::attempt($data)) {
                return response([
                    'errors' => ['el imail o el password son incorrectos']
                ],422);
             }
             //autenticacion con token
             $user = Auth::user();
             $paht = public_path().'/imagenes/DISTRI.png';
             //ewnvio los permisos que tiene disponible
             $permisos = Permisos::where('user_id',$user->id)->get();
             return [
                'token' => $user->createToken('token')->plainTextToken,
                'user' => $user,
                'permisos' => $permisos,

             ];
            
    }
    // cerrar cession
    public function logout(Request $request)
    {
      $user = $request->user();
      $user->currentAccessToken()->delete();
      return [
         'user' => null
      ];
    return $user;
   }

//    creacion de usuario nuevo
    public function create(users $request)
    {
        // 
        //imagen
        $nombre = '';
        $datos = '';
        if($_FILES){
            $nombre =$_FILES['imagen']['name']['archivo'];
            // $ruta = $_SERVER['DOCUMENT_ROOT']."";
            $ruta = $_SERVER['DOCUMENT_ROOT']."/storage/";
            $archivotmp = $_FILES['imagen']['tmp_name']['archivo'];
            // $nombreURL = $archivotmp->store('imagenes');
            $datos = (move_uploaded_file($archivotmp,$ruta.$nombre));
            $link = asset('/storage/'.$nombre);
            // $archivotmp->store();

        }else{
        } 
        
        // siempre va a heredar la empresa del que lo esta creacndo 
        $empresa = Auth::user()->empresas;
        $data = $request->validated();
        $insert = [   
        ];
        $user= User::create([
            'name' =>$data['nombre'],
            'apellido' =>$data['apellido'],
            'email' =>$data['email'],
            'password' =>bcrypt($data['password']),
            'cedula' =>$data['cedula'],
            'empresas' =>$empresa,
            'img' =>$nombre,
            'rol'=>'0'
        ]);
        $permisos = Permisos::create([
            'dashboard'=>($data['dashboard']), 
            'administrador'=>($data['administrador']),
            'usuarios'=>($data['usuarios']),
            'recepcion'=>($data['recepcion']),
            'ajustes'=>($data['ajustes']),
            'campanas'=>($data['campanas']),
            'contabilidad'=>($data['contabilidad']),
            'transferencias'=>($data['transferencias']),
            'proveedor'=>($data['proveedor']),
            'user_id'=>$user->id
        ]);
        // return response()->json($_FILES) ;
        // return $data;
        return ['mensaje'=>"se creo el usuario"];





        
    }
//   optener los permisos de un usuario
    public function permisos(Request $request)
    {
        $user = $request->user();
        $permisos = Permisos::where('user_id',$user->id)->get();
        return $permisos;
    }
    // creacion rapida de un usuario
    public function force(){
        $user = User::create([
            'name'=> 'Administrador',
            'apellido'=>'Admin',
            'email'=> 'Administrador@administrador.com',
            'password'=>bcrypt('12345'),
            'empresas'=>'1',
            'cedula'=>'1143994831',
            'img'=>'sinfoto.jpg'

         ]);
         //creando el token para utenticar
         $user->createToken('token')->plainTextToken;
         return response()->json(['usuarios'=>User::all()]);
    }

    public function index()
    {
        $vista = DB::select(
        'select u.id,u.name,u.apellido,u.email,u.cedula,u.created_at as fecha_inicio,count(c.id) as clientes,
        count(
        case
        when c.estados = 7 then 1 end) as cerrados from users u 
        inner join clientes c on c.users_id = u.id
        inner join estados e on c.estados = e.id
        GROUP BY u.name,u.email,u.cedula,u.created_at,u.id,u.apellido');
        return response()->json($vista);
    }
    // muestra los usuarios de esa empresa con sus permisos respectivos
    public function users_permisos()
    {
        $empresas = Auth::user()->empresas;
        $vista = DB::select(
        "   select 
            u.id,u.activo,u.name,u.apellido,u.cedula,u.email,u.img, p.dashboard,
            u.created_at,u.rol,
            p.administrador, p.usuarios, p.recepcion, p.ajustes, 
            p.campanas, p.contabilidad, p.transferencias, p.proveedor
            from users u
            inner join permisos p on p.user_id = u.id
            inner join empresas em on u.empresas = em.id
            where em.id = '".$empresas."'
        ");
        return response()->json($vista);
    }
    //actualiza los permisos de los usuarios
    public function updatePermisos(Request $request)
    {
        $permisos = Permisos::where('user_id',$request['id'])->get();
        $permisos->toQuery()->update([
            'dashboard' => $request['dashboard'],
            'administrador' => $request['administrador'],
            'recepcion' => $request['recepcion'],
            'ajustes' => $request['ajustes'],
            'campanas' => $request['campanas'],
            'contabilidad' => $request['contabilidad'],
            'transferencias' => $request['transferencias'],
            'proveedor' => $request['proveedor'],
           ]
        );
        return 'Actualizado...';
    }
    //bloquea a los usuarios
    public function BloqueoUser(Request $request)
    {
        $permisos = User::where('id',$request['id'])->get();
        $permisos->toQuery()->update([
            'activo' => 0,
           ]
        );
        return 'Actualizado...';
    }
    //activasion de usuarios
    public function ActivaUser(Request $request)
    {

        $permisos = User::where('id',$request['id'])->get();
        $permisos->toQuery()->update([
            'activo' => 1,
           ]
        );
        return 'Actualizado...';
    }
    public function user()
    {
        return response()->json(Auth::user()->rol);
    }
}
