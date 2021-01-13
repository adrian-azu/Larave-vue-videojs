@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 class="row justify-content-center">Create Product</h1>
@stop

@section('content')
<div id="app"><create-component></create-component></div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
