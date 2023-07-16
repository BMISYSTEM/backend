<?php

namespace App\Http\Controllers;

use Dotenv\Store\File\Paths;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\String\ByteString;

class ImagenesController extends Controller
{
    public function store()
    {
        $foto = $_GET['nombre'];
        $archivo = Storage::get('public/vehiculos/'.$foto);
       return $archivo;
    }

    public function link()
    {
        Artisan::call('storage:link');
    }
}
