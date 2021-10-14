<?php

namespace App\Http\Controllers;

use App\Models\PcpPaciente;
use Illuminate\Http\Request; //recuperar datos de la vista

use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use DataTables;


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
        $datos['pcp_pacientes']=PcpPaciente::paginate(10);
        return view('paciente.index', $datos);
    }

    public function pdf()
    {
        //
        //$datos['pcp_pacientes']=PcpPaciente::paginate();
        //return view('paciente.pdf');
        return "hola mundo";
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

        $campos=
        [
            'pcp_foto'=>'required|max:10000|mimes:jpeg,png,jpg',
            'pcp_rut'=>'required|int|unique:pcp_pacientes',
            'pcp_nombre'=>'required|string|max:100',
            'pcp_primer_apellido'=>'required|string|max:100',
            'pcp_segundo_apellido'=>'required|string|max:100'
        ];
        $mensaje=
        [
            //'required'=>'El :attribute es requerido',
            'pcp_foto.required'=>'La Foto es requerida',
            'pcp_rut.required'=>'El RUT es requerido',
            'pcp_nombre.required'=>'El Nombre es requerido',
            'pcp_primer_apellido.required'=>'El Apellido Paterno es requerido',
            'pcp_segundo_apellido.required'=>'El Apellido Materno es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosPcpPaciente = request()->all(); se obtiene toda la info, se almacena en la variable
        $datosPcpPaciente = request()->except('_token'); //se almacena en la variable toda la info excepto el token
        
        if($request->hasFile('pcp_foto'))
        {
            $datosPcpPaciente['pcp_foto']=$request->file('pcp_foto')->store('uploads','public');
        }

        PcpPaciente::insert($datosPcpPaciente);
        
        //return response()->json($datosPcpPaciente); //se muestra la info almacenada en la variable, por json
        return redirect('paciente')->with('mensaje', 'Paciente agregado con éxito');
        //return response()->json(['mensaje'=>'Paciente agregrado con éxito']);
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

        $campos=
        [
            'pcp_rut'=>'required|int',
            'pcp_nombre'=>'required|string|max:100',
            'pcp_primer_apellido'=>'required|string|max:100',
            'pcp_segundo_apellido'=>'required|string|max:100'
        ];
        $mensaje=
        [
            //'required'=>'El :attribute es requerido',
            'pcp_rut.required'=>'El RUT es requerido',
            'pcp_nombre.required'=>'El Nombre es requerido',
            'pcp_primer_apellido.required'=>'El Apellido Paterno es requerido',
            'pcp_segundo_apellido.required'=>'El Apellido Materno es requerido'
        ];

         if($request->hasFile('pcp_foto'))
         {
            $campos=['pcp_foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['pcp_foto.required'=>'La Foto es requerida'];
         }

        $this->validate($request, $campos, $mensaje);

        //
        /*$datosPcpPaciente = DB::table('pcp_pacientes')
        ->where('pcp_cuenta_corriente', $request->pcp_cuenta_corriente)
        ->update
        ([
            "pcp_foto" => $request->pcp_foto,
            "pcp_rut" => $request->pcp_rut,
            "pcp_nombre" => $request->pcp_nombre,
            "pcp_primer_apellido" =>  $request->pcp_primer_apellido,
            "pcp_segundo_apellido" => $request->pcp_segundo_apellido
        ]);*/
       
       $datosPcpPaciente = request()->except(['_token','_method','updated_at']);

        if($request->hasFile('pcp_foto'))
        {
            $pcp_paciente=PcpPaciente::findOrFail($id);
            //->where(id, $id)
            Storage::delete('public/'.$pcp_paciente->pcp_foto);
            $datosPcpPaciente['pcp_foto']=$request->file('pcp_foto')->store('uploads','public');
        }

        PcpPaciente::where('id','=', $id)->update($datosPcpPaciente);
        $pcp_paciente=PcpPaciente::findOrFail($id);

        //return view('paciente.edit', compact('pcp_paciente'));
        return redirect('paciente')->with('mensaje', 'Paciente Modificado');
       
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
        $pcp_paciente=PcpPaciente::findOrFail($id);

        if(Storage::delete('public/'.$pcp_paciente->pcp_foto))
        {
            PcpPaciente::destroy($id);
        }


        return redirect('paciente')->with('mensaje', 'Paciente Borrado');
    }
}
