<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>solicitud</title>
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
        width: auto;
        text-align: center;
        padding: 10px;
    }
    .img-vehiculo{
        width: auto;
        height: auto;
        max-width: 30rem;
        max-height: 30rem;
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
        width: 48.3%;
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
    .h-99{
        height: 99rem;
    }
    .h-2{
        height: 1rem;
    }
    .h-full{
        height: 100%;
    }
    .p-1{
        padding: 1rem;
    }
    .flex{
        display: flex;
        flex-direction: row;
        gap:1rem;
    }
    .flex-row{
        flex-direction: row;
    }
    .grid{
        display: grid;
    }
    .grid-template-col-3{
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
    .grid-template-crow-3{
        grid-template-row: repeat(3, minmax(0, 1fr));
    }
    .grid-template-crow-4{
        grid-template-row: repeat(4, minmax(0, 1fr));
    }
    .border-2{
        border:solid 1px gray;
        padding: 0.2rem;
        
    }
    .rounded-full{
        border-radius: 100%
    }
    .m-0{
        margin: 0;
    }
    .items-between{
        justify-content: space-between;
    }
    .text-left{
        text-align: left;
    }
    .border-4{
        border: 4px solid gray;
    }
    .p-0{
        padding: 0;
    }
    .text-lg{
        font-size: 12px;
        font-weight:bold;
        font-family: sans-serif;
    }
    .titulo{
        background: gray;
        color:white;
        padding: 0.5rem;
    }
    .border-l{
        border-left: 0;
        border-bottom: 1px solid black;
        border-right: 1px solid black;
        border-top: 1px solid black;
    }
    .border-r{
        border-left: 1px solid black;
        border-bottom: 1px solid black;
        border-right: 0px solid black;
        border-top: 1px solid black;
    }
    .border-1-l{
        border-left:  1px solid gray;
    }
    .border-1-t{
        border-top:  1px solid gray;
    }
    .border-1-r{
        border-right:  1px solid gray;
    }
    .border-1-b{
        border-bottom:  1px solid gray;
    }
    
</style>
<body>
            {{-- logo
            <div class="">
                <h1>imagen de logo</h1>
            </div>
            {{-- titulo del pdf  --}}
        <div>

                <h1>Solicitud para el estudio de credito persona natural</h1>
                <div>
                    <p>fecha expediccion</p>
                    <p>No.Solicitud</p>
                </div>
                <h2>datos requeridos por los establecimientos de credito y entidades aseguradoras</h2>
                <table class="w-full ">
                    <tr>
                        <td>tipo:</td>
                        <td>Asesor:</td>
                        <td>c.c asesor:</td>
                        <td>vitrina:</td>
                    </tr>
                </table>
        
                <h1 class="w-full text-center titulo">Datos del credito</h1>
                
                    <table class="w-full itemns-center text-lg text-center border-none">
                            <tr class="itemns-center  text-center font-bold">
                                <td class="text-left border-2 w-full h-2 text-lg">Marca:</td>
                                <td class="text-left border-2 w-full h-2 text-lg">Valor vehiculo:</td>
                                <td class="text-left border-2 w-full h-2 text-lg">Tipo:</td>
                            </tr>
                        
                            <tr class="contenedor-tabla w-full  items-between m-0 ">
                                <td class="text-left border-2 w-full h-2 text-lg">Vehiculo:</td>
                                <td class="text-left border-2 w-full h-2 text-lg">Valor Cuota extra:</td>
                                <td class="text-left border-2 w-full h-2 text-lg">Cuota inicial:</td>
                            </tr>
                            <tr class="contenedor-tabla w-full  items-between m-0 ">
                                <td class="text-left border-2 w-full h-2 text-lg">Valor seguro:</td>
                                <td class="text-left border-2 w-full h-2 text-lg">Valor a financiar:</td>
                                <td class="text-left border-2 w-full h-2 text-lg">Plazo:</td>
                            </tr>
                            <tr class="contenedor-tabla w-full  items-between m-0  ">
                                <td class="text-left border-2 w-full h-2 text-lg">Plan:</td>
                                <td class="text-left border-r w-full h-2 text-lg">Tasa:</td>
                                <td class="text-left border-l w-full h-2 text-lg"></td>
                            </tr>
                            <tr class="contenedor-tabla w-full  items-between m-0 ">
                                <td class="text-left border-r w-full h-2 text-lg">Financiero:</td>
                                <td class="text-left border-1-t border-1-b w-full h-2 text-lg"></td>
                                <td class="text-left border-1-t border-1-b border-1-r w-full h-2 text-lg"></td>
                            </tr>
                    </table>
              
            {{-- segundo cuadro --}}
            <h1 class="w-full text-center titulo">Datos Personales del cliente</h1>
            <div class="">
                <table class="w-full itemns-center text-lg text-center border-none">
                    <tbody class="p-0 m-0">
                        <tr class="contenedor-tabla w-full  items-between m-0 ">
                            <td class="text-left  border-1-t border-1-b border-1-l w-full h-2 text-lg">Nombre Completo:</td>
                            <td class="text-left  border-1-t border-1-b w-full h-2 text-lg"></td>
                            <td class="text-left  border-1-t border-1-b w-full h-2 text-lg"></td>
                            <td class="text-left  border-1-t border-1-b border-1-r w-full h-2 text-lg"></td>
                        </tr>
                        <tr class="contenedor-tabla w-full  items-between m-0 ">
                            <td class="text-left border-1-b border-1-r border-1-l w-full h-2 text-lg">Fecha Nacimiento:</td>
                            <td class="text-left border-1-b border-1-r  w-full h-2 text-lg">Tipo de Documento:</td>
                            <td class="text-left border-1-b w-full h-2 text-lg">Numero de Identificacion:</td>
                            <td class="text-left border-1-b border-1-r   w-full h-2 text-lg"></td>
                        </tr>
                        <tr class="contenedor-tabla w-full  items-between m-0 ">
                            <td class="text-left border-1-b border-1-l border-1-r w-full h-2 text-lg">Ciudad:</td>
                            <td class="text-left border-1-b border-1-l border-1-r w-full h-2 text-lg">Genero:</td>
                            <td class="text-left border-1-b border-1-l border-1-r w-full h-2 text-lg">Estado Civil:</td>
                            <td class="text-left border-1-b border-1-l border-1-r w-full h-2 text-lg">Fecha de expediccion:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full  items-between m-0  ">
                            <td class="text-left border-1-b border-1-l border-1-r w-full h-2 text-lg">Direccion:</td>
                            <td class="text-left border-1-b border-1-l border-1-r w-33 h-2 text-lg">Telefono:</td>
                            <td class="text-left border-1-b border-1-l  w-33 h-2 text-lg">Celular:</td>
                            <td class="text-left border-1-b border-1-r w-33 h-2 text-lg"></td>
                        </tr>
                        <tr class="contenedor-tabla w-full  items-between m-0 ">
                            <td class="text-left w-full h-2 border-1-b border-1-r border-1-l text-lg">Tipo Vivienda:</td>
                            <td class="text-left w-full h-2 border-1-b border-1-r border-1-l text-lg">Email:</td>
                            <td class="text-left w-full h-2 border-1-b  border-1-l text-lg">Antiguedad Vivienda:</td>
                            <td class="text-left w-full h-2 border-1-b border-1-r  text-lg"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- tercer cuadro --}}
            {{-- <h1 class="w-full text-center titulo">Informacion Laboral Cliente</h1>
            <div class="">
                <table class="w-full  p-0 m-0">
                    <tbody class="p-0 m-0">
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Tipo de trabajo:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Profesion:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Nit:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Empresa:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Antiguedad Laboral:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Telefono:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0  ">
                            <td class="text-left border-2 w-33 h-full text-lg">Detalle:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Direccion:</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            {{-- cuarto cuadro --}}
            {{-- <h1 class="w-full text-center titulo">Ingresos y Egresos cliente</h1>
            <div class="">
                <table class="w-full  p-0 m-0">
                    <tbody class="p-0 m-0">
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Ingresos fijos:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Ingresos variables:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Otros ingresos:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Gastos:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Otros Egresos:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Tiene Vehiculo:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0  ">
                            <td class="text-left border-2 w-full h-full text-lg">Total Ingresos:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Total Activos:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Total Pasivos:</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            {{-- cuarto cuadro --}}
            {{-- <h1 class="w-full text-center titulo">Refrencia Personales</h1>
            <div class="">
                <table class="w-full  p-0 m-0">
                    <tbody class="p-0 m-0">
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Nombre:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Telefono:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Ciudad:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Direccion:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0">
                            <td class=" border-2 w-full h-full text-lg text-center">Refrencia Personal 2</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Nombre:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Telefono:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Ciudad:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Direccion:</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            {{-- cuarto cuadro --}}
            {{-- <h1 class="w-full text-center titulo">Refrencia Familiares</h1>
            <div class="">
                <table class="w-full  p-0 m-0">
                    <tbody class="p-0 m-0">
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Nombre:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Telefono:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Ciudad:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Direccion:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0">
                            <td class=" border-2 w-full h-full text-lg text-center">Refrencia Familiares 2</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Nombre:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Telefono:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Ciudad:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Direccion:</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            {{-- cuarto cuadro --}}
            {{-- <h1 class="w-full text-center titulo">Refrencias Empresariales-Comerciales</h1>
            <div class="">
                <table class="w-full  p-0 m-0">
                    <tbody class="p-0 m-0">
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Nombre:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Nit:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Telefonos:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Ciudad:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Direccion:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0  ">
                            <td class="text-center border-2 w-full h-full text-lg">Referencia 2:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Nombre:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Nit:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Telefonos:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Ciudad:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Direccion:</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            {{-- cuarto cuadro --}}
            {{-- <h1 class="w-full text-center titulo">Informacion del conyugue</h1>
            <div class="">
                <table class="w-full  p-0 m-0">
                    <tbody class="p-0 m-0">
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Nombre:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Fecha nacimiento:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Cedula:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Trabaja:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Telefono:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Salario:</td>
                        </tr>
                        <tr class="contenedor-tabla w-full flex items-between m-0 ">
                            <td class="text-left border-2 w-full h-full text-lg">Otros ingresos:</td>
                            <td class="text-left border-2 w-full h-full text-lg">Egresos:</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
        </div>
</body>
</html>