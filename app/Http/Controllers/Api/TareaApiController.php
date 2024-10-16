<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TareasApiRequest;
use App\Http\Response\Api\JsonHttpResponse;
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
        return JsonHttpResponse::successResponse($tareas,'succses');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TareasApiRequest $request)
    {
        $tareas = Tarea::create([
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "estado" => $request->estado,
            "fecha_vencimiento" => $request->fecha_vencimiento,
            
        ]);

        return JsonHttpResponse::successResponse($tareas,'creado');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tareas = Tarea::where("id", $id)->first();
        return JsonHttpResponse::successResponse($tareas,'succses');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TareasApiRequest $request, string $id)
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
    
      
        return JsonHttpResponse::successResponse($tareas,'Actualizado');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tareas = Tarea::where ('id',$id) -> delete();
        return JsonHttpResponse::successResponse($tareas,'eliminado');
        
    }
}
