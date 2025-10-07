<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function index()
    {
        $personas = Persona::orderByDesc('id')->paginate(10);
        return view('personas.index', compact('personas'));
    }
}