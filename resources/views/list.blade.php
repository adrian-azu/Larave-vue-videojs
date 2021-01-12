@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Product</h1>

@stop

@section('content')
<div id='app'>
<list-component>

</list-component>
</div>
@stop
@section('plugins.Datatables', true)
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
