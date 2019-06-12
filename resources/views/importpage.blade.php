@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Halaman Import</li>
      </ol>
    </section>
@endsection

@section('content')
<p>halaman import</p>
@endsection