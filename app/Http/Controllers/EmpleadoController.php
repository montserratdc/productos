<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados']=Empleado::paginate(5);// Vamos a conultar la fuente a través de Empleados. 5 Registros.
        return view('empleado.index',$datos);  // Se le esta proporionando al index la informacion.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('empleado.create');   // Se le esta dando información al Controlador de la vista.
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $datosEmpleado = request()->except('_token');  //Recibe toda la información y la prepara para enviarla a la Base de Daatos y guardar la información.
      
        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
       
        }

      
      Empleado::insert($datosEmpleado); // Insertas los campos que te están enviando.
      
      return response()->json($datosEmpleado); // Devuelve toda la información que se ha entregado al formulario.
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
         //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado=Empleado::findOrFail($id);
      return view ('empleado.edit', compact('empleado'));   //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Empleado::destroy($id);  // Parametro que utilizará para borrar.
       return redirect('empleado');
    }
}
