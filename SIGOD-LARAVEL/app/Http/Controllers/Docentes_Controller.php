<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Docentes;

use App\Municipios;
use App\Ingresos;
use App\Categorias;
use App\Relaciones_Laborales;
use App\Dedicaciones;
use App\Areas;
use App\Concursos;

class Docentes_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Docentes = Docentes::orderBy('cedula','DESC')->paginate(8);

        $Municipios           = DB::table('municipios')->get();
        $Ingresos             = DB::table('ingresos')->get();
        $Categorias           = DB::table('categorias')->get();
        $Relaciones_Laborales = DB::table('relaciones_Laborales')->get();
        $Dedicaciones         = DB::table('dedicaciones')->get();
        $Areas                = DB::table('areas')->get();
        $Concursos            = DB::table('concursos')->get();

        return view('Docentes.index', compact('Docentes'),compact('Categorias','Relaciones_Laborales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Municipios           = DB::table('municipios')->get();
        $Ingresos             = DB::table('ingresos')->get();
        $Categorias           = DB::table('categorias')->get();
        $Relaciones_Laborales = DB::table('relaciones_Laborales')->get();
        $Dedicaciones         = DB::table('dedicaciones')->get();
        $Areas                = DB::table('areas')->get();
        $Concursos            = DB::table('concursos')->get();

        return view('Docentes.create',compact('Municipios','Ingresos','Categorias','Relaciones_Laborales','Dedicaciones','Areas','Concursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 
            'cedula'        =>'required',
            'primer_nombre'        =>'required',
            'segundo_nombre'        =>'required',
            'primer_apellido'        =>'required',
            'segundo_apellido'        =>'required',
            'correo'        =>'required',
            'direccion'        =>'required',
            'telefono'        =>'required',
            'id_municipio'        =>'required',
            'id_ingreso'        =>'required',
            'id_categoria'        =>'required',
            'id_relacion_laboral'        =>'required',
            'id_dedicacion'        =>'required',
            'id_area'        =>'required',
            'id_concurso'        =>'required',
            'titulo_pregrado'        =>'required',
        ]);
        Docentes::create($request->all());
        return redirect()->route('Docentes.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = NULL)
    {
        $Docentes = Docentes::find($id);
        return  view('Docentes.index',compact('Docentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cedula)
    {
        $Docentes             = Docentes::find($cedula);
        $Municipios           = DB::table('municipios')->get();
        $Ingresos             = DB::table('ingresos')->get();
        $Categorias           = DB::table('categorias')->get();
        $Relaciones_Laborales = DB::table('relaciones_Laborales')->get();
        $Dedicaciones         = DB::table('dedicaciones')->get();
        $Areas                = DB::table('areas')->get();
        $Concursos            = DB::table('concursos')->get();

        return view('Docentes.edit',compact('Docentes'),compact('Municipios','Ingresos','Categorias','Relaciones_Laborales','Dedicaciones','Areas','Concursos'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = NULL)
    {
        
        $this->validate($request,[ 
            'cedula'        =>'required',
            'primer_nombre'        =>'required',
            'segundo_nombre'        =>'required',
            'primer_apellido'        =>'required',
            'segundo_apellido'        =>'required',
            'correo'        =>'required',
            'direccion'        =>'required',
            'telefono'        =>'required',
            'id_municipio'        =>'required',
            'id_ingreso'        =>'required',
            'id_categoria'        =>'required',
            'id_relacion_laboral'        =>'required',
            'id_dedicacion'        =>'required',
            'id_area'        =>'required',
            'id_concurso'        =>'required',
            'titulo_pregrado'        =>'required',
        ]);
 
        Docentes::find($id)->update($request->all());
        return redirect()->route('Docentes.index')->with('success','Registro actualizado satisfactoriamente');
 
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Docentes::find($id)->delete();
        return redirect()->route('Docentes.index')->with('success','Registro eliminado satisfactoriamente');
    } 
}
