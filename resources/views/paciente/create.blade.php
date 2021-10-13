crear
<form action="{{ url('/paciente')}}" method="POST" enctype="multipart/form-data">
@csrf

@include('paciente.form')

</form>
