<!--datos en comun con create y edit-->
    <div class="form-floating">
        <label for="RUT">RUT</label>
        <input type="number" class="form-control" id="pcp_rut" name="pcp_rut" value="{{ isset($pcp_paciente->pcp_rut)?$pcp_paciente->pcp_rut:'' }}" placeholder="RUT">
    </div>
    <div class="form-floating">
        <label for="CuentaCorriente">Cuenta Corriente</label>
        <input type="number" class="form-control" id="pcp_cuenta_corriente" name="pcp_cuenta_corriente" value="{{ isset($pcp_paciente->pcp_cuenta_corriente)?$pcp_paciente->pcp_cuenta_corriente:'' }}" placeholder="Número de Cuenta Corriente">
    </div>
    <div class="form-floating">
        <label for="Nombre">Nombre</label>
        <input type="text" class="form-control" id="pcp_nombre" name="pcp_nombre" value="{{ isset($pcp_paciente->pcp_nombre)?$pcp_paciente->pcp_nombre:'' }}" placeholder="Nombre">
    </div>
    <div class="form-floating">
        <label for=">PrimerApellido">Primer Apellido</label>
        <input type="text" class="form-control" id="pcp_primer_apellido" name="pcp_primer_apellido" value="{{ isset($pcp_paciente->pcp_primer_apellido)?$pcp_paciente->pcp_primer_apellido:'' }}" placeholder="Primer Apellido">
    </div>
    <div class="form-floating">
        <label for="SegundoApellido">Segundo Apellido</label>
        <input type="text" class="form-control" id="pcp_segundo_apellido" name="pcp_segundo_apellido" value="{{ isset($pcp_paciente->pcp_segundo_apellido)?$pcp_paciente->pcp_segundo_apellido:'' }}" placeholder="Segundo Apellido">
    </div>
    <div class="form-floating">

        <label for="Foto">Foto</label><br>
        @if(isset($pcp_paciente->pcp_foto))
        <!--{{ $pcp_paciente->pcp_foto }}-->
        <img src=" {{ asset('storage').'/'.$pcp_paciente->pcp_foto }}" width="100" alt="">
        <br>
        @endif
        <input type="file" class="form-control" id="pcp_foto" value="" name="pcp_foto">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary" id="enviar">Guardar Datos</button>
    </div>