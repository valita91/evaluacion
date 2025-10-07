<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Http\Response;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        $data = $request->validate([
            'nombre'   => ['required','string','max:100'],
            'apellido' => ['required','string','max:100'],
            'telefono' => ['nullable','string','max:30'],
        ]);

        $persona = Persona::create($data);

        return response()->json(['ok' => true, 'data' => $persona], Response::HTTP_CREATED);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
       $data = $request->validate([
            'nombre'   => ['sometimes','required','string','max:100'],
            'apellido' => ['sometimes','required','string','max:100'],
            'telefono' => ['nullable','string','max:30'],
        ]);

        $persona->update($data);

        return response()->json(['ok' => true, 'data' => $persona]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {  $persona->delete(); // Soft delete
     return response()->noContent();
    }
}




 