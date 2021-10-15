<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ public_path('css/app.css') }}" rel=stylesheet type="text/css">
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
            </tr>
        </thead>

        <tbody>
        @foreach ($pcp_pacientes as $pcp_paciente)
            <tr>
                <td>
                    <img class="img-thumbnail img-fluid" src=" {{ public_path('storage').'/'.$pcp_paciente->pcp_foto }}" width="100" alt="">
                <!--{{ $pcp_paciente->pcp_foto }}-->
                </td>
                <td>{{ $pcp_paciente->pcp_rut }}</td>
                <td>{{ $pcp_paciente->id }}</td>
                <td>{{ $pcp_paciente->pcp_nombre }}</td>
                <td>{{ $pcp_paciente->pcp_primer_apellido }}</td>
                <td>{{ $pcp_paciente->pcp_segundo_apellido }}</td>
            </tr>
         @endforeach
        </tbody>
    </table>
</body>
</html>