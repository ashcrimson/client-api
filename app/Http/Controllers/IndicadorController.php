<?php

namespace App\Http\Controllers;

use App\Models\Indicador;
use App\Http\Requests\StoreIndicadorRequest;
use App\Http\Requests\UpdateIndicadorRequest;

class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json("Indicador Index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIndicadorRequest $request)
    {
        Indicador::create($request->validated());
        return response()->json("Indicador Creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Indicador $indicador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indicador $indicador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIndicadorRequest $request, Indicador $indicador)
    {
        

        $indicador->update($request->validated());

        return response()->json("Indicador Actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indicador $indicador)
    {
        //
    }
}
