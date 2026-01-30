<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use Illuminate\Http\Request;


class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['alumnos'] = Alumno::paginate(10);
        return view('alumno.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        //
        /*$datosAlumno = request()->all();
        $datosAlumno = request()->except('_token');
        Alumno::create($datosAlumno);
        return response()->redirectTo(route('index'));
*/
        $datosAlumno = $request->except('_token');

        if ($request->hasFile('Foto')) {
            $datosAlumno['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        \App\Models\Alumno::create($datosAlumno);

        return redirect('/alumno')->with('mensaje', 'Alumno guardado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //

        return view('alumno.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {

        $datosAlumno = $request->except(['_token', '_method']);

        if ($request->hasFile('Foto')) {
            if ($alumno->Foto) {
                \Illuminate\Support\Facades\Storage::delete('public/' . $alumno->Foto);
            }


            $datosAlumno['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }


        $alumno->update($datosAlumno);


        return redirect('alumno')->with('mensaje', 'Alumno actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
        if ($alumno->Foto) {
            \Storage::delete('public/' . $alumno->Foto);
        }
        $alumno->delete();
        return redirect('alumno')->with('mensaje', __('messages.confirm_delete'));
    }
}
