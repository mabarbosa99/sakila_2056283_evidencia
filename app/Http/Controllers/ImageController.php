<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("imagenes.new");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Traer la ubicacion del archivo
        $archivo_original=$_FILES["nombre_archivo"]['tmp_name'];
        //var_dump($archivo_original);
        //objeto intervencion de operaciones  con imagenes
        $intervention = new ImageManager;
        //construir la imagen apartir del 
        $miniatura=$intervention->make($archivo_original);
        //miniatura de la imagen
        $miniatura->resize(150,150);
        $miniatura->sharpen(15);
        //guardar la imagen 
        $ruta_imagenes=public_path()."\imagenes\'";
        $miniatura->save($ruta_imagenes."miniatura-".$_FILES["nombre_archivo"]['name']);
        var_dump($archivo_original);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
