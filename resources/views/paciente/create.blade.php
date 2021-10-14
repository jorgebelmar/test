@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/paciente')}}" method="POST" enctype="multipart/form-data">
@csrf

@include('paciente.form', ['modo'=>'Crear'])

</form>
</div>
@endsection