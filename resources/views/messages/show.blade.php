@extends('layouts.app')

@section('content')
	<h1>Mensaje</h1>
	<p>enviado por {{ $messages->nombre }} - {{ $messages->email }}</p>
	<p>{{ $messages->mensaje}}</p>
	@stop