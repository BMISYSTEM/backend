<?php
namespace App\Http\Controllers;
use App\Models\cliente;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use App\Http\Requests\Clientes;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Http\Resources\clientesResource;
use App\Models\clientes_documento;
use App\Models\empresa;
use App\Models\notificacion;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    // creacion de un nuevo cliente
    public function create(Clientes $request){
        $vehiculo = $request->validated();
        $user= Auth::user()->id;
        $empresa = Auth::user()->empresas;

        $email = '';
        if($vehiculo['email'])
        {
            $email = $vehiculo['email'];
        }
        else{
            $email = 'no definido';
        }
        // se debe cambiar el estado en el de una lista fija
        $creado = cliente::create([
            'nombre' => $vehiculo['nombre'],
            'apellido' => $vehiculo['apellido'],
            'cedula' => $vehiculo['cedula'],
            'date' => $vehiculo['data'],
            'telefono' => $vehiculo['telefono'],
            'email' => $email,
            'estados'=>'1',
            'users_id'=> $user,
            'empresas'=>$empresa
        ]);
        return $creado;
    }

    // consuilta la informacion de un solo cliente 
    public function cliente()
    {
        $id = $_GET['id'];
        $cliente = cliente::find($id);
        return response()->json($cliente);
    }
    // devuelve el estado de los clientes
    public function index()
    {
        return new clientesResource(cliente::with('user')->with('estado')->with('vehiculo')->get());
    }
// permite descargar un documento en especial del cliente
    public function descargasdoc(Request $request)
    {
        $documento = $request['documento'];
        $paht = storage_path('app/public/documentos/'.$documento);
        return  response()->download($paht);
        // return $paht;
        // return $request;
    }


    //actualizacionn de estado 
    public function updateEstados (Request $request)
    {
        $estado = $request['id'];
        $cliente = $request['cliente'];
        $update = cliente::where('id',$cliente)->get();
        $update->toQuery()->update([
            'estados' => $estado
        ]);
        $mensaje = 'El cliente '. $request['user_name']. ' cambio de estado a '.$request['nombre_estado'];
        $notificacion = notificacion::create([
            'user_id' => $request['user'],
            'mensaje' => $mensaje,
            'visto' =>'no'
        ]);
        return 'el cambio se realizo de forma correcta';
    }

    public function vendidos()
    {

        $vista = DB::select("select c.id, c.nombre, c.apellido, c.cedula,c.date, c.telefono, c.email, c.vfinanciar, c.ncuotas, c.valormensual, c.doccedula, c.docestratos, c.docdeclaracion, c.docsolicitud, c.created_at, c.updated_at, c.vehiculos, c.estados, c.users_id, c.tasa,
        u.name,u.rol,v.valor,v.placa
        from clientes as c
        inner join users u on c.users_id = u.id
        inner join vehiculos v on c.vehiculos = v.id
        where c.estados ='7'");
        return response()->json($vista);
    }
    public function pendientes()
    {

        $vista = DB::select("select c.id, c.nombre, c.apellido, c.cedula,c.date, c.telefono, c.email, c.vfinanciar, c.ncuotas, c.valormensual, c.doccedula, c.docestratos, c.docdeclaracion, c.docsolicitud, c.created_at, c.updated_at, c.vehiculos, c.estados, c.users_id, c.tasa,
        u.name,u.rol,v.valor,v.placa,e.estado as nombre_estado
        from clientes as c
        inner join users u on c.users_id = u.id
        inner join vehiculos v on c.vehiculos = v.id
        inner join estados e on c.estados = e.id
        where c.estados ='4'");
        return response()->json($vista);
    }
    public function aprobados()
    {

        $vista = DB::select("select c.id, c.nombre, c.apellido, c.cedula,c.date, c.telefono, c.email, c.vfinanciar, c.ncuotas, c.valormensual, c.doccedula, c.docestratos, c.docdeclaracion, c.docsolicitud, c.created_at, c.updated_at, c.vehiculos, c.estados, c.users_id, c.tasa,
        u.name,u.rol,v.valor,v.placa,e.estado as nombre_estado
        from clientes as c
        inner join users u on c.users_id = u.id
        inner join vehiculos v on c.vehiculos = v.id
        inner join estados e on c.estados = e.id
        where c.estados ='5'");
        return response()->json($vista);
    }
    // trae la informacion de seguimiento del asesor si es 0 trae solo la de el y si es 1 consulta todo de la empresa
    public function seguimiento()
    {   
        $inicio = $_GET['inicio'];
        $fin =$_GET['fin'];
        $rol = Auth::user()->rol;
        $user = Auth::user()->id;
        $empresa = Auth::user()->empresas;
        // super administrador
        if($rol == 1)
        {
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
            u.name,
            u.img,
             e.id as estados_id, e.estado, e.created_at, e.updated_at,e.pendiente,e.aprobado,e.rechazado,
             t.comentarios as comentario,t.fecha as fecha,
             e.color as color
             from clientes c
            inner join users u on c.users_id = u.id
            inner join empresas em on u.empresas = em.id
            inner join estados e on e.id = c.estados
            left join (SELECT max(created_at) as ultima_nota,clientes as clientes FROM notas GROUP BY clientes ) as ult on c.id = ult.clientes
            left join (select proximo_seguimiento fecha,clientes clientes,comentario comentarios,created_at as ult_nota from notas GROUP BY clientes,proximo_seguimiento,comentario,created_at order by proximo_seguimiento desc) as t  on t.clientes = c.id and ult.ultima_nota = t.ult_nota
            where em.id= '".$empresa."' and c.transferido = 0 and c.created_at BETWEEN '".$inicio."' AND '".$fin."'
            group by u.name,u.img,c.id,t.comentarios,t.clientes,c.nombre,c.apellido,c.cedula,c.date,c.telefono,c.email,c.estados,c.users_id,e.id,e.estado,e.created_at,e.updated_at,t.fecha,e.color,e.pendiente,e.aprobado,e.rechazado
            ORDER BY  fecha DESC");
        }else{

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
            u.name,
            u.img,
            e.id as estados_id, e.estado, e.created_at, e.updated_at,e.pendiente,e.aprobado,e.rechazado,
             t.comentarios as comentario,t.fecha as fecha,
             e.color as color
             from clientes c
            inner join users u on c.users_id = u.id
            inner join empresas em on u.empresas = em.id
            inner join estados e on e.id = c.estados
            left join (SELECT max(created_at) as ultima_nota,clientes as clientes FROM notas GROUP BY clientes ) as ult on c.id = ult.clientes
            left join (select proximo_seguimiento fecha,clientes clientes,comentario comentarios,created_at as ult_nota from notas GROUP BY clientes,proximo_seguimiento,comentario,created_at order by proximo_seguimiento desc) as t  on t.clientes = c.id and ult.ultima_nota = t.ult_nota
            where em.id= '".$empresa."' and u.id = ".$user." and c.transferido = 0 and c.created_at BETWEEN '".$inicio."' AND '".$fin."'
            group by u.name,u.img,c.id,t.comentarios,t.clientes,c.nombre,c.apellido,c.cedula,c.date,c.telefono,c.email,c.estados,c.users_id,e.id,e.estado,e.created_at,e.updated_at,t.fecha,e.color,e.pendiente,e.aprobado,e.rechazado
            ORDER BY  fecha DESC");
        }
        return response()->json($vista);
        // comentario de prueba
    }
    public function seguimiento_centro()
    {
        $rol = Auth::user()->rol;
        $user = Auth::user()->id;
        $empresa = Auth::user()->empresas;
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
         t.comentarios as comentario,t.fecha as fecha,
         e.color as color
         from clientes c
        inner join users u on c.users_id = u.id
        inner join empresas em on u.empresas = em.id
        inner join estados e on e.id = c.estados
        inner join clientes_documentos cd on c.id = cd.cliente and em.id = cd.empresa
        left join (SELECT max(created_at) as ultima_nota,clientes as clientes FROM notas GROUP BY clientes ) as ult on c.id = ult.clientes
        left join (select proximo_seguimiento fecha,clientes clientes,comentario comentarios,created_at as ult_nota from notas GROUP BY clientes,proximo_seguimiento,comentario,created_at order by proximo_seguimiento desc) as t  on t.clientes = c.id and ult.ultima_nota = t.ult_nota
        where 	em.id= ".$empresa."
        		and cd.centrofinanciero = '1'
        group by c.id,t.comentarios,t.clientes,c.nombre,c.apellido,c.cedula,c.date,c.telefono,c.email,c.estados,c.users_id,e.id,e.estado,e.created_at,e.updated_at,t.fecha,e.color
        ORDER BY  fecha DESC");

        return response()->json($vista);
        // comentario de prueba
    }
    public function busqueda()
    {   
        $empresa = Auth::user()->empresas;
        $telefono = $_GET['telefono'];
        $email = $_GET['email'];
        // valida que venga el telefono pero no el email
        if($telefono  and !$email)
        {
           $result = DB::select("select * from clientes c inner join users u on c.users_id = u.id 
            inner join empresas e on u.empresas = e.id
            where c.telefono = ".$telefono. " and e.id = ". $empresa ); 
        }elseif(!$telefono  and $email)
        {   //valida que venga el email pero el telefono no
            $result = DB::select("select * from clientes c inner join users u on c.users_id = u.id 
            inner join empresas e on u.empresas = e.id
            where c.email = '".$email. "' and e.id = ". $empresa ); 
        }elseif($telefono  and $email)
        {  //Si viene tanto email como telefono 
            $result = DB::select("select * from clientes c inner join users u on c.users_id = u.id 
            inner join empresas e on u.empresas = e.id
            where c.email = '".$email. "' and c.telefono = ".$telefono. " and e.id = ". $empresa ); 
        }
        
        if($result){
            return response()->json($result);
        }else{
            return '0';
        }
    }

    // administrara los documentos que lleguen de cada cliente
    public function documentos(Request $request) 
    {
        // usuario el cual esta cargando el documento
        $user = Auth::user()->id;
        $empresa = Auth::user()->empresas;
        // capturo el documento que viene en un formdata
        $documento = $request->file('documento')->store('public/documentos');
        //extraigo la url del documento para guardarlo en la base de datos
        $urdocumento = Storage::url($documento);
        // campturamos tipo y el cliente al cual pertenece el documento
        $cliente = $request['cliente'];
        $tipo = $request['tipo'];

        $docbd = clientes_documento::create([
            'usuario' => $user,
            'cliente' => $cliente,
            'empresa' => $empresa,
            'urldoc'  => $urdocumento,
            'tipo'    => $tipo,
            'centrofinanciero'  => $request['centro']
        ]);
        return response()->json($docbd);
    }
    // retorno de lista de documentos del cliente
    public function documentosall()
    {
        $empresa = Auth::user()->empresas;
        $cliente = $_GET['id'];
        $documentos = DB::select('select * from clientes_documentos where cliente = '. $cliente .' and empresa = '. $empresa . ' ;');
        return response()->json($documentos);
    }
    // ediccion de informacion del cliente
    public function updateCliente (Request $request) 
    {   
        $empresas = Auth::user()->empresas;
        $mensaje = '';
        $request->validate(
            [
                'telefono' => 'required|numeric',
            ],
            [
                'telefono.required' => 'El telefono es obligatorio',
                'telefono.numeric' => 'El telefono debe ser numerico',
            ]
        );
        // Se consulta que el numero que se esta tratando de asignar no exista dentro de la misma empresa, para evitar colapsos dentro de la integridad del dato
        $repeatcliente = DB::select('SELECT COUNT(*) as rp FROM clientes WHERE telefono = ' . $request['telefono'] . ' AND empresas = ' . $empresas);
        $cliente = cliente::find($request['id']);
        if( $cliente['telefono'] <> $request['telefono'] ){

            if ($repeatcliente[0]->rp == 0 ){
                
                $cliente->nombre = $request['nombre'];
                $cliente->apellido = $request['apellido'];
                $cliente->cedula = $request['cedula'];
                $cliente->telefono = $request['telefono'];
                $cliente->email = $request['email'];
                $cliente->save();
                $mensaje = 'Cliente actualizado';
            }else{
                $mensaje = 'El Numero que desea establecer se encuentra en uso';
            }
        }else{
            $cliente->nombre = $request['nombre'];
            $cliente->apellido = $request['apellido'];
            $cliente->cedula = $request['cedula'];
            $cliente->email = $request['email'];
            $cliente->save();
            $mensaje = 'Cliente actualizado';
        }
        return response()->json(['Update' => $mensaje]);
    }
 }

