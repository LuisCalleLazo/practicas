<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __invoke()
    {
        return "<h1>ESTA ES LA PRIMERA VISTA</h1>";
    }
}
