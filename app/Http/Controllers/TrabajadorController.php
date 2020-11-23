<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Trabajador::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'usuario' => 'required',
            'nombre' => 'required',
            'oficio' => 'required',
            'edad' => 'required',
            'correo' => 'required'
        ]);

        $request->merge([
            'id_tipo'=>2
        ]);
        
        $trabajador = new Trabajador();
        
        $trabajador->usuario = $request->usuario;
        $trabajador->nombre = $request->nombre;
        $trabajador->oficio = $request->oficio;
        $trabajador->edad = (int)$request->edad;
        $trabajador->correo = $request->correo;
        $trabajador->id_tipo = $request->id_tipo;

        $trabajador->save();


        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show($trabajador)
    {
        return Trabajador::findOrFail($trabajador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajador $trabajador)
    {
        $trabajador->update($request->all());

        return $trabajador;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy($trabajador)
    {
        Trabajador::destroy($trabajador);
    }
}
