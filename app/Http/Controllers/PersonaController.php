<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index() {
        // return "<h1>El index de personas</h1>";
        return view('persona.index');
    }
    public function create() {
        // return "<h1>Para crear persona</h1>";
        return view('persona.create');
    }
    public function show($persona) {
        // return "<h1>Buscar persona por id</h1>";
        return view('persona.show', compact('persona'));
    }
}
