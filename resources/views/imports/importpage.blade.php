@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Halaman Import </li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Import {{ $unsur }}</div>
                </div>

                <div class="box-body">
                	<div class="alert alert-warning">
					  Urutan Kolom pada berkas adalah sebagai berikut : <br>
					  <strong> {{ $kolom }}</strong> <br>
					  Nama kolom tidak perlu dicantumkan, berkas hanya berisi data dengan urutan sperti di atas.
					</div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @include('imports._form')
                </div>
            </div>
        </div>
    </div>

@endsection