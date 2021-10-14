<!--datos en comun con create y edit-->
<h1>{{ $modo }} Paciente</h1> 

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
    <!--</div>
        <div class="form-floating">
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
        <button type="submit" class="btn btn-success btn-enviar" id="enviar">{{ $modo }} Datos</button>
        <a class="btn btn-primary" href="{{ url('paciente/')}}">Regresar</a>
    </div>