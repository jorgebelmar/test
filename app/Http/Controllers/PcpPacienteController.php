<?php

namespace App\Http\Controllers;

use App\Models\PcpPaciente;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PcpPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['pcp_pacientes']=PcpPaciente::paginate(5);
        return view('paciente.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosPcpPaciente = request()->all(); se obtiene toda la info, se almacena en la variable
        $datosPcpPaciente = request()->except('_token'); //se almacena en la variable toda la info excepto el token
        
        if($request->hasFile('pcp_foto'))
        {
            $datosPcpPaciente['pcp_foto']=$request->file('pcp_foto')->store('uploads','public');
        }

        PcpPaciente::insert($datosPcpPaciente);
        
        return response()->json($datosPcpPaciente); //se muestra la info almacenada en la variable, por json
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PcpPaciente  $pcp_paciente
     * @return \Illuminate\Http\Response
     */
    public function show(PcpPaciente $pcp_paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PcpPaciente  $pcp_paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pcp_paciente=PcpPaciente::findOrFail($id);        
        return view('paciente.edit', compact('pcp_paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\$pcp_paciente  $pcp_paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosPcpPaciente = request()->except(['_token','_method']);

        if($request->hasFile('pcp_foto'))
        {
            $pcp_paciente=PcpPaciente::findOrFail($id);
            Storage::delete('public/'.$pcp_paciente->pcp_foto);
            $datosPcpPaciente['pcp_foto']=$request->file('pcp_foto')->store('uploads','public');
        }

        PcpPaciente::where('id','=', $id)->update($datosPcpPaciente);
        $pcp_paciente=PcpPaciente::findOrFail($id);        
        return view('paciente.edit', compact('pcp_paciente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\$pcp_paciente  $pcp_paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PcpPaciente::destroy($id);
        return redirect('paciente');
    }
}
