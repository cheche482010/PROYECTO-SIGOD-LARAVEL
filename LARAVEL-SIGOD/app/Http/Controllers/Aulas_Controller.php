<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aulas;
class Aulas_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Aulas = Aulas::orderBy('id','DESC')->paginate(8);
        return view('Aulas.index',compact('Aulas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Aulas.create');
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
            'numero'        =>'required',
            'nombre_aula'   =>'required',
            'ubicacion'     =>'required', 
            'asignacion'    =>'required', 
            'capacidad'     =>'required',
        ]);
        Aulas::create($request->all());
        return redirect()->route('Aulas.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = NULL)
    {
        $Aulas = Aulas::find($id);
        return  view('Aulas.index',compact('Aulas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = NULL)
    {
        $Aulas = Aulas::find($id);
        return view('Aulas.edit',compact('Aulas'));    
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
            'numero'        =>'required',
            'nombre_aula'   =>'required',
            'ubicacion'     =>'required', 
            'asignacion'    =>'required', 
            'capacidad'     =>'required',
        ]);
 
        Aulas::find($id)->update($request->all());
        return redirect()->route('Aulas.index')->with('success','Registro actualizado satisfactoriamente');
 
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aulas::find($id)->delete();
        return redirect()->route('Aulas.index')->with('success','Registro eliminado satisfactoriamente');
    } 
}
