@extends('backpack::layout')
@section('before_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js" integrity="sha256-qSIshlknROr4J8GMHRlW3fGKrPki733tLq+qeMCR05Q=" crossorigin="anonymous"></script>
@stop
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">Hujan 30 Hari terakhir</div>
                </div>

                <div class="box-body">
                <canvas id="Hujan-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Hujan-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @foreach($data['hujans'] as $hujan)
                                    "{{ $hujan['tanggal'] }}",
                                @endforeach
                            ],
                        datasets: [
                            {
                            label: "Hujan",
                            backgroundColor: ["#162756"],
                            data: [
                                @foreach($data['hujans'] as $hujan)
                                    "{{ $hujan['total'] }}",
                                @endforeach
                            ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Hujan 30 Hari Terakhir (mm)'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
@stop
