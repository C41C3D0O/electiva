<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use App\Models\Tareas;
use Illuminate\Http\Request;

class TareaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::get();
        return response()->json(data: $tareas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tareas = Tarea::create([
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "estado" => $request->estado,
            "fecha_vencimiento" => $request->fecha_vencimiento,
        ]);
    
        if ($tareas) {
            return response()->json(['message' => 'se ha agregado una nueva tarea','data'=>$tareas], 200);
        }
        else{
            return response()->json(['message' => 'error, no se puede agregar una tarea'], 500);
        } 
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tareas = Tarea::where("id", $id)->first();
        if ($tareas) {
            return response()->json(data: $tareas);
        }
        else{
            return response()->json(['message' => 'No se pudo encontrar la tarea.'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'estado' => 'required|string',
            'fecha_vencimiento' => 'required|date',
        ]);
    
        $tareas = Tarea::where('id', $id)->update([
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "estado" => $request->estado,
            "fecha_vencimiento" => $request->fecha_vencimiento,
        ]);
    
        if ($tareas) {
            return response()->json(['message' => 'el rejistro se actualizo correctamente','data'=>$tareas], 200);
        }
        else{
            return response()->json(['message' => 'el rejistro no existe'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tareas = Tarea::where ('id',$id) -> delete();
        if ($tareas) {
            return response()->json(['message' => 'el rejistro se ha eliminado.','data'=>$tareas], 200);
        }
        else{
            return response()->json(['message' => 'el rejistro no existe'], 500);
        }
    }
}
