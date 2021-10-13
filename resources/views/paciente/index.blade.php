soy el index
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
                <img src=" {{ asset('storage').'/'.$pcp_paciente->pcp_foto }}" alt="">
                <!--{{ $pcp_paciente->pcp_foto }}-->
            </td>
            <td>{{ $pcp_paciente->pcp_rut }}</td>
            <td>{{ $pcp_paciente->pcp_cuenta_corriente }}</td>
            <td>{{ $pcp_paciente->pcp_nombre }}</td>
            <td>{{ $pcp_paciente->pcp_primer_apellido }}</td>
            <td>{{ $pcp_paciente->pcp_segundo_apellido }}</td>      
            <td>
                
                <a href="{{ url('/paciente/'.$pcp_paciente->id.'/edit') }}">Editar</a>| 

                <form action=" {{ url('/paciente/'.$pcp_paciente->id) }}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('¿Seguro de borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>