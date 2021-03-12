<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Unidades_Curriculares;
use App\Ejes_Formacion;  

class Unidades_Curriculares_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Unidades_Curriculares = Unidades_Curriculares::orderBy('id_unidad_curricular','DESC')->paginate(8);
        $Ejes_Formacion = Ejes_Formacion::get();
        return view('Unidades.index',compact('Unidades_Curriculares'),compact('Ejes_Formacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Ejes_Formacion = Ejes_Formacion::get();
        return view('Unidades.create', compact('Ejes_Formacion'));
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
            'nombre_unidad'       =>'required',
            'trayecto'            =>'required',
            'fase'                =>'required', 
            'id_eje_formacion'    =>'required', 
            
        ]);
        Unidades_Curriculares::create($request->all());
        return redirect()->to('Unidades_Curriculares')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = NULL)
    {
        $Unidades_Curriculares = Unidades_Curriculares::find($id);
        return  view('Unidades.index',compact('Unidades_Curriculares'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = NULL)
    {
        $Unidades_Curriculares = Unidades_Curriculares::find($id);
        $Ejes_Formacion = Ejes_Formacion::get();
        return view('Unidades.edit',compact('Unidades_Curriculares'), compact('Ejes_Formacion'));    
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
            'nombre_unidad'       =>'required',
            'trayecto'            =>'required',
            'fase'                =>'required', 
            'id_eje_formacion'    =>'required', 
        ]);
 
        Unidades_Curriculares::find($id)->update($request->all());
        return redirect()->to('Unidades_Curriculares')->with('success','Registro actualizado satisfactoriamente');
 
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_unidad_curricular)
    {
        Unidades_Curriculares::find($id_unidad_curricular)->delete();
        return redirect()->to('Unidades_Curriculares')->with('success','Registro eliminado satisfactoriamente');
    } 
}