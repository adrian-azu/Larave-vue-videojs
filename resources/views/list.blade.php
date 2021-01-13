@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 class="row justify-content-center">Product</h1>

@stop

@section('content')
<div id='app'>
{{-- <list-component></list-component>
<datatable-vue></datatable-vue> --}}
<datatable-list></datatable-list>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
