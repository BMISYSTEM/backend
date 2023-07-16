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
        width: 33%;
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
    .grid{
        display: grid;
    }
    .grid-template-col-3{
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
    .border-2{
        border:solid 2px gray;
    }
    .rounded-full{
        border-radius: 100%
    }
</style>
<body class="pdf">
    
    
    <div>
        <h1 class="titulo-cartmots">CARTSMOT-PDF-00001</h1>
    </div>
    <div class="footer">
        <p><?php echo e($fecha); ?></p>
        <h1 class="text-center font-bold"><?php echo e($empresa); ?></h1>
    </div>
    <div class="contenedor-imagen">
        
        <img class="img-vehiculo" src=<?php echo e(public_path('/storage/vehiculos/'.$foto)); ?> alt="">
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
                    <td ><?php echo e($marca); ?></td>
                    <td ><?php echo e($modelo); ?></td>
                    <td ><?php echo e($valor); ?></td>
                    <td >0</td>
                    <td ><?php echo e($valor); ?></td>
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
                <?php $__currentLoopData = $asesorios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesorio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr class="itemns-center rounded-sm bg-slate-200 text-center mt-2 p-1">
                        <td ><?php echo e($asesorio['nombre']); ?></td>
                        <td ><?php echo e($asesorio['marca']); ?></td>
                        <td ><?php echo e($asesorio['estado']); ?></td>
                        <td ><?php echo e($asesorio['valor']); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <h1 class="text-center w-full font-bold">Documentos</h1>
    <div class="w-full text-center border-2 rounded-xl">
        <?php if($cedula): ?>
            <p>Cedula</p>
        <?php endif; ?>
        <?php if($extratos): ?>
            <p>Extratos</p>
        <?php endif; ?>
        <?php if($solicitudcredito): ?>
            <p>Solicitud de credito</p>
        <?php endif; ?>
        <?php if($certificadolaboral): ?>
            <p>Certificado Laboral</p>
        <?php endif; ?>
        <?php if($declaracion): ?>
            <p>Declaracion</p>
        <?php endif; ?>
        <?php if($cartascomerciales): ?>
            <p>Cartas Comerciales</p>
        <?php endif; ?>
        <?php if($facturaproveedor): ?>
            <p>Facturas de Proveedores</p>
        <?php endif; ?>
        <?php if($facturaproveedor): ?>
            <p>Facturas de Proveedores</p>
        <?php endif; ?>
        <?php if($cartacupo): ?>
            <p>Cartas De Cupo</p>
        <?php endif; ?>
        <?php if($camaraycomercio): ?>
            <p>Camara y Comercio</p>
        <?php endif; ?>
        <?php if($rut): ?>
            <p>Rut</p>
        <?php endif; ?>
        <?php if($resolucionpension): ?>
            <p>Resolucion de Pensions</p>
        <?php endif; ?>
        <?php if($desprendibles): ?>
            <p>Desprendibles</p>
        <?php endif; ?>
        <?php if($certificadotradiccion): ?>
            <p>Certificado de tradiccion</p>
        <?php endif; ?>
    </div>
    <h1 class="text-center w-full font-bold">Matricula (costos)</h1>
    <div class="w-full text-center border-2 rounded-xl">
        <p>TRASPASO: <?php echo e($traspasos); ?></p>
        <p>HONORARIOS: <?php echo e($honorarios); ?></p>
        <p>IMPUESTOS: <?php echo e($impuestos); ?></p>
        <p>PIGNORACION: <?php echo e($pignoracion); ?></p>
        <p>CERTIFICADO DE TRADICCION: <?php echo e($certificadotradiccion); ?></p>
        <p>SIGIN/PERITAJE: <?php echo e($siginperitaje); ?></p>
    </div>
    <h1 class="text-center w-full font-bold">Retoma</h1>
    <div class="w-full text-center border-2 rounded-xl">
        <?php if($placaretoma): ?>
        <p>PLACA: <?php echo e($placaretoma); ?></p>
        <?php endif; ?>
        <?php if($marcaretoma): ?>
        <p>MARCA: <?php echo e($marcaretoma); ?></p>
        <?php endif; ?>
        <?php if($refvehiculo): ?>
        <p>REFERENCIA: <?php echo e($refvehiculo); ?></p>
        <?php endif; ?>
        <?php if($modeloretoma): ?>
        <p>MODELO: <?php echo e($modeloretoma); ?></p>
        <?php endif; ?>
        <?php if($kilometrajeretoma): ?>
        <p>KILOMETRAJE: <?php echo e($kilometrajeretoma); ?></p>
        <?php endif; ?>
        <?php if($valorretoma): ?>
        <p>VALOR: <?php echo e($valorretoma); ?></p>
        <?php endif; ?>
        <?php if($descripcionretoma): ?>
        <p>DESCRIPCION: <?php echo e($descripcionretoma); ?></p>
        <?php endif; ?>
        
    </div>
    <div class="text-sm ">
        <p>
            <img class="img-ico" src=<?php echo e(public_path('/storage/docpdf/user.png')); ?> alt="">
            <span class="font-bold">Consultor:</span>
             <?php echo e($usuarioname); ?> <?php echo e($apellido); ?></p>
        <p>
            <img class="img-ico" src=<?php echo e(public_path('/storage/docpdf/wpp.png')); ?> alt="">
            <span class="font-bold">Telefono:</span>
            3184482848</p>
        <p>
            <img class="img-ico" src=<?php echo e(public_path('/storage/docpdf/gmail.png')); ?> alt="">
            <span class="font-bold">Email:</span>
            <?php echo e($usuarioemail); ?></p>
        <img class="rounded-full w-10 h-10" src=<?php echo e(public_path('/storage/'.$fotoperfil)); ?> alt="">
    </div>
</body>
</html><?php /**PATH /var/www/html/resources/views/pdf.blade.php ENDPATH**/ ?>