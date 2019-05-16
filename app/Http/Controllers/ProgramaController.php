<?php

namespace App\Http\Controllers;

use App\Programa;
use Illuminate\Http\Request;
Use Alert;


class ProgramaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $programas = programa::all();

        return view('admin.programa.show', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'codigo' => 'required|numeric'
        ]);

        if(Programa::create($request->all())){

            return redirect()->back()->with('msj',"Programa registro exitosamente");
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit(programa $programa)
    {
        return view('admin.programa.detalles', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programa $programa)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'codigo' => 'required'
        ]);

        $data = $request->toArray();

        $programa->nombre = $data['nombre'];
        $programa->codigo = $data['codigo'];

        if ($programa->save()) {
            Alert::success('Programa modificado', '')->showCloseButton();
            return redirect()->route('programa.detalles',$programa);
        }else{
            Alert::error('Hubo un error intentalo mas tarde', '')->showCloseButton();
            return redirect()->route('programa.detalles',$programa);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programa $programa)
    {
        if ($asigna->delete()){
            Alert::success('Asignatura eliminada', '')->showCloseButton();
            return redirect()->route('asignaturas.show');
        }else{
            Alert::error('Hubo un error intentalo mas tarde', '')->showCloseButton();
            return redirect()->route('asignaturas.show');
        }
    }
}
