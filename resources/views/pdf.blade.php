<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
</head>
<style  type="text/css">
    .titulo-cartmots{
       font-size: 12px; 
    }
    .pdf{
       margin: 0; 
       font-family: sans-serif;
    }
    
    .img-footer{
        width: 100%;
        height: 10rem;
    }
    .img-ico{
        width: 1rem;
        height: 1rem;
        background-image: cover;
    }
    .contenedor-imagen{
        width: 100%;
        height: auto;
        text-align: center;
        padding: 10px;
    }
    .img-vehiculo{
        width: 20rem;
        height: 20rem;
        max-width: 25rem;
        max-height: 25rem;
        margin: 0 auto;
        border-radius: 10px;
    }
    .text-center{
        text-align: center;
    }
    .font-bold{
        font: bold;
        font-size: 20px;
    }
    .contenedor-tabla{
        text-align: center;
        align-items: center;
        width: 100%;
    }
    .w-full{
        width: 100%
    }
    .w-33{
        width: 33%;
    }
    .w-1-2{
        width: 40%;
    }
    .w-10{
        width: 10rem;
    }
    .items-center{
        align-items: center;
    }
    .rounded-xl{
        border-radius: 20px;
    }
    .bg-slate-500{
        background: #B5B5B5;
    }
    .bg-slate-200{
        background: #EFE9E9;
    }
    .border-none{
        text-decoration: none;
        border-collapse: collapse;
    }
    .mt-2{
        margin-top: 2rem;
    }
    .text-sm{
        font-size: 13px
    }
    .h-10{
        height: 10rem;
    }
    .h-2{
        height: 2rem;
    }
    .p-1{
        padding: 1rem;
    }
    .flex{
        display: flex;
    }
    .flex-row{
        flex-direction: row;
    }
    .flex-col{
        flex-direction:column;
    }
    .grid{
        display: grid;
    }
    .grid-template-col-3{
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
    .grid-template-col-1{
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap:1rem;
    }
    .border-2{
        border:solid 2px gray;
    }
    .rounded-full{
        border-radius: 100%
    }
    .page-break {
    page-break-after: always;
    }
    .text-xl{
        font-size: 20px;
    }
</style>
<body class="pdf">
    {{-- asi se recibe una variable --}}
    {{-- {{$datos}} --}}
    <div>
        <h1 class="titulo-cartmots">CARTSMOT-PDF</h1>
        <h1 class="w-full text-center text-xl">Cotizacion</h1>
    </div>
    <div class="footer">
        <p>{{$fecha}}</p>
        <h1 class="text-center font-bold">{{$empresa}}</h1>
    </div>
    <div class="contenedor-imagen">
        <table>
            <tbody>
                <tr>
                    <td>
                         <img class="img-vehiculo" src={{public_path($foto1)}} alt="">
                    </td>
                    <td class="grid grid-template-col-1">
                        <div class="w-full">
                            <img class="w-1-2" src={{public_path($foto2)}} alt="">
                        </div>
                        <div class="w-full">
                            <img class="w-1-2" src={{public_path($foto3)}} alt="">
                        </div>
                        <div class="w-full">
                            <img class="w-1-2" src={{public_path($foto4)}} alt="">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="contenedor-tabla">
        <table class="w-full itemns-center text-xl text-center border-none p-1">
            <thead >
                <tr class="itemns-center rounded-xl bg-slate-500 text-center font-bold p-1">
                    <td >Vehiculo</td>
                    <td >Modelo</td>
                    <td >Precio Publico</td>
                    <td >Descuento</td>
                    <td >Precio Venta</td>
                </tr>
            </thead>
            <tbody >
                <tr class="itemns-center rounded-sm bg-slate-200 text-center mt-2 p-1">
                    <td >{{$marca}}</td>
                    <td >{{$modelo}}</td>
                    <td >{{$valor}}</td>
                    <td >0</td>
                    <td >{{$valor}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h1 class="text-center w-full font-bold">Asesorios</h1>
    <div>
        <table class="w-full itemns-center text-xl text-center border-none p-1">
            <thead >
                <tr class="itemns-center rounded-xl bg-slate-500 text-center font-bold p-1">
                    <td >Nombre</td>
                    <td >Marca</td>
                    <td >Estado</td>
                    <td >Valor</td>
                </tr>
            </thead>
            <tbody >
                @if($asesorios)
                    @foreach ($asesorios as $asesorio )
                            <tr class="itemns-center rounded-sm bg-slate-200 text-center mt-2 p-1">
                            <td >{{$asesorio['nombre']}}</td>
                            <td >{{$asesorio['marca']}}</td>
                            <td >{{$asesorio['estado']}}</td>
                            <td >{{$asesorio['valor']}}</td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>Sin Asesorios registrados</td>
                    </tr>

                @endif
               
            </tbody>
        </table>
    </div>
    <h1 class="text-center w-full font-bold">Documentos</h1>
    <div class="w-full text-center border-2 rounded-xl">
        @if ($cedula)
            <p>Cedula</p>
        @endif
        @if ($extratos)
            <p>Extratos</p>
        @endif
        @if ($solicitudcredito)
            <p>Solicitud de credito</p>
        @endif
        @if ($certificadolaboral)
            <p>Certificado Laboral</p>
        @endif
        @if ($declaracion)
            <p>Declaracion</p>
        @endif
        @if ($cartascomerciales)
            <p>Cartas Comerciales</p>
        @endif
        @if ($facturaproveedor)
            <p>Facturas de Proveedores</p>
        @endif
        @if ($facturaproveedor)
            <p>Facturas de Proveedores</p>
        @endif
        @if ($cartacupo)
            <p>Cartas De Cupo</p>
        @endif
        @if ($camaraycomercio)
            <p>Camara y Comercio</p>
        @endif
        @if ($rut)
            <p>Rut</p>
        @endif
        @if ($resolucionpension)
            <p>Resolucion de Pensions</p>
        @endif
        @if ($desprendibles)
            <p>Desprendibles</p>
        @endif
        @if ($certificadotradiccion)
            <p>Certificado de tradiccion</p>
        @endif
    </div>
    <div class="page-break"></div>   
    <h1 class="text-center w-full font-bold">Matricula (costos)</h1>
    <div class="w-full text-center border-2 rounded-xl">
        <p>TRASPASO: {{$traspasos}}</p>
        <p>HONORARIOS: {{$honorarios}}</p>
        <p>IMPUESTOS: {{$impuestos}}</p>
        <p>PIGNORACION: {{$pignoracion}}</p>
        <p>CERTIFICADO DE TRADICCION: {{$certificadotradiccion}}</p>
        <p>SIGIN/PERITAJE: {{$siginperitaje}}</p>
    </div>
    <p class="text-1-sm text-center">Desarrollado Por CartMots/SYPRODS</p>
     
    @if ($placaretoma<> '-' OR $marcaretoma <> '-' OR $refvehiculo <> '-' OR $modeloretoma <> '-' OR $kilometrajeretoma <> '-' OR $valorretoma <> '-' OR $descripcionretoma <> '-')
        
        <h1 class="text-center w-full font-bold">Retoma</h1>
        <div class="w-full text-center border-2 rounded-xl">
            @if ($placaretoma)
            <p>PLACA: {{$placaretoma}}</p>
            @endif
            @if ($marcaretoma)
            <p>MARCA: {{$marcaretoma}}</p>
            @endif
            @if ($refvehiculo)
            <p>REFERENCIA: {{$refvehiculo}}</p>
            @endif
            @if ($modeloretoma)
            <p>MODELO: {{$modeloretoma}}</p>
            @endif
            @if ($kilometrajeretoma)
            <p>KILOMETRAJE: {{$kilometrajeretoma}}</p>
            @endif
            @if ($valorretoma)
            <p>VALOR: {{$valorretoma}}</p>
            @endif
            @if ($descripcionretoma)
            <p>DESCRIPCION: {{$descripcionretoma}}</p>
            @endif
            
        </div>
    @endif
    <div class="text-sm ">
        <p>
            <img class="img-ico" src={{public_path('/storage/docpdf/user.png')}} alt="">
            <span class="font-bold">Consultor:</span>
             {{$usuarioname}} {{$apellido}}</p>
        <p>
            <img class="img-ico" src={{public_path('/storage/docpdf/wpp.png')}} alt="">
            <span class="font-bold">Telefono:</span>
            3184482848</p>
        <p>
            <img class="img-ico" src={{public_path('/storage/docpdf/gmail.png')}} alt="">
            <span class="font-bold">Email:</span>
            {{$usuarioemail}}</p>
        <img class="rounded-full w-10 h-10" src={{public_path('/storage/'.$fotoperfil)}} alt="">
    </div>
</body>
</html>