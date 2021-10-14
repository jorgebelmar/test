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

        <a href="{{ url('paciente/create')}}" class="btn btn-success mb-4">Registrar nuevo empleado</a>
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
    </div>
@endsection