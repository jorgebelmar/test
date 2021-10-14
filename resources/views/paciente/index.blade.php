@extends('layouts.app')
@section('content')
    <div class="container">

        @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-disimss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
        @endif

    <!--<div class="row">
            <div class="col-7">-->
                <a href="{{ route('paciente.create') }}" class="btn btn-success mb-4">Registrar nuevo paciente</a>
                <table class="table table-light">
                
                <a href="{{ route('paciente.pdf') }}" class="btn btn-success mb-4 float-right">Generar PDF</a>
                <table class="table table-light">
                
                    <thead class="thead-light">
                        <tr>
                            <th>Foto</th>
                            <th>RUT</th>
                            <th>Cuenta Corriente</th>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pcp_pacientes as $pcp_paciente)
                        <tr>
                            <td>
                                <img class="img-thumbnail img-fluid" src=" {{ asset('storage').'/'.$pcp_paciente->pcp_foto }}" width="100" alt="">
                                <!--{{ $pcp_paciente->pcp_foto }}-->
                            </td>
                            <td>{{ $pcp_paciente->pcp_rut }}</td>
                            <td>{{ $pcp_paciente->id }}</td>
                            <td>{{ $pcp_paciente->pcp_nombre }}</td>
                            <td>{{ $pcp_paciente->pcp_primer_apellido }}</td>
                            <td>{{ $pcp_paciente->pcp_segundo_apellido }}</td>      
                            <td>
                                
                                <a href="{{ url('/paciente/'.$pcp_paciente->id.'/edit') }}" class="btn btn-warning">Editar</a> 

                                <form action=" {{ url('/paciente/'.$pcp_paciente->id) }}" class="d-inline" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿Seguro de borrar?')" value="Borrar" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $pcp_pacientes->links() !!}
        <!--</div>-->

{{--             <div class="col-5">
                @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach( $errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-floating">
                    <label for="Foto"></label><br>
                    <input type="file" class="form-control mb-3" id="pcp_foto" value="" name="pcp_foto">
                    @if(isset($pcp_paciente->pcp_foto))
                        <!--{{ $pcp_paciente->pcp_foto }}-->
                        <img class="img-thumbnail img-fluid mb-3" src=" {{ asset('storage').'/'.$pcp_paciente->pcp_foto }}" width="100" alt="">
                        <br>
                    @endif    
                </div>
                <div class="form-floating">
                    <label for="RUT">RUT</label>
                    <input type="number" class="form-control" id="pcp_rut" name="pcp_rut" value="{{ isset($pcp_paciente->pcp_rut)?$pcp_paciente->pcp_rut:old('pcp_rut') }}" placeholder="RUT">
                </div>
                <!--<div class="form-floating">
                    <label for="CuentaCorriente">Cuenta Corriente</label>
                    <input type="number" class="form-control" id="pcp_cuenta_corriente" name="pcp_cuenta_corriente" value="{{ isset($id->id)?$id->id:'' }}" placeholder="Cuenta Corriente">
                </div>-->
                <div class="form-floating">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control" id="pcp_nombre" name="pcp_nombre" value="{{ isset($pcp_paciente->pcp_nombre)?$pcp_paciente->pcp_nombre:old('pcp_nombre') }}" placeholder="Nombre">
                </div>
                <div class="form-floating">
                    <label for=">PrimerApellido">Primer Apellido</label>
                    <input type="text" class="form-control" id="pcp_primer_apellido" name="pcp_primer_apellido" value="{{ isset($pcp_paciente->pcp_primer_apellido)?$pcp_paciente->pcp_primer_apellido:old('pcp_primer_apellido') }}" placeholder="Primer Apellido">
                </div>
                <div class="form-floating">
                    <label for="SegundoApellido">Segundo Apellido</label>
                    <input type="text" class="form-control" id="pcp_segundo_apellido" name="pcp_segundo_apellido" value="{{ isset($pcp_paciente->pcp_segundo_apellido)?$pcp_paciente->pcp_segundo_apellido:old('pcp_segundo_apellido') }}" placeholder="Segundo Apellido">
                </div>
                <div class="form-floating mt-4">
                    <button type="submit" class="btn btn-success btn-enviar" id="enviar">Editar Datos</button>
                    <a class="btn btn-primary" href="{{ url('paciente/')}}">Regresar</a>
                </div>
            </div> --}}
    </div>
@endsection