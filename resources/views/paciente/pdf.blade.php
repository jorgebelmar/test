<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Listado de Pacientes</h2>
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
</body>
</html>