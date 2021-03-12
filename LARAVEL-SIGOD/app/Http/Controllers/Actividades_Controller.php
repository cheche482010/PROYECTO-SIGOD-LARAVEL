<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Actividades;
use App\Tipos_Actividades;
use App\Dependencias;


class Actividades_Controller extends Controller{ 
    /*** Display a listing of the resource.
    ** @return \Illuminate\Http\Response*/
    public function index(){
        $Tipos_Actividades = Tipos_Actividades::get();
        $Dependencias = Dependencias::get();

        $Actividades = Actividades::orderBy('id_actividad','DESC')->paginate(10);
        return view('Actividades.index',compact('Actividades'),['Dependencias'=>$Dependencias, 'Tipos_Actividades'=>$Tipos_Actividades]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Tipos_Actividades = Tipos_Actividades::get();
        $Dependencias = Dependencias::get();
        
        return view('Actividades.create', compact('Dependencias'), compact('Tipos_Actividades'));
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
            'id_tipo_actividad'  =>'required',
            'descripcion_actividad'     =>'required',
            'id_dependencia'     =>'required', 
        ]);
        Actividades::create($request->all());
        return redirect()->route('Actividades.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = NULL)
    {
        $Actividades = Actividades::find($id);
        return  view('Actividades.index',compact('Actividades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_actividad)
    {
        $Actividades = Actividades::find($id_actividad);
        $Tipos_Actividades = Tipos_Actividades::get();
        $Dependencias = Dependencias::get();
        return view('Actividades.edit',compact('Actividades'), ['Dependencias'=>$Dependencias, 'Tipos_Actividades'=>$Tipos_Actividades]);    
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
            'id_tipo_actividad'  =>'required',
            'descripcion_actividad'     =>'required',
            'id_dependencia'     =>'required', 
        ]);
 
        Actividades::find($id)->update($request->all());
        return redirect()->route('Actividades.index')->with('success','Registro actualizado satisfactoriamente');
 
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Actividades::find($id)->delete();
        return redirect()->route('Actividades.index')->with('success','Registro eliminado satisfactoriamente');
    } 
} 
