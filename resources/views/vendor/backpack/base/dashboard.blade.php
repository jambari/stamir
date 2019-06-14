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
{{-- start of brief info --}}
    <div class="row">
        <div class="col-md-3">
            <div class="info-box bg-red-gradient">
                <span class="info-box-icon"><i class="wi wi-raindrops"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Hujan </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                    <span class="info-box-number">{{ $data['totalrains'] }} terentri</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-green-gradient">
                <span class="info-box-icon"><span class="wi wi-thermometer"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Temperatur</span>
                    <span class="info-box-number">
                        {{ $data['totaltemps'] }} terentri
                    </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-yellow-gradient">
                <span class="info-box-icon"><span class="wi wi-wind-direction"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Angin</span>
                    <span class="info-box-number">{{ $data['totalwinds'] }} terentri</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-purple-gradient">
                <span class="info-box-icon"><span class="wi wi-humidity"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Lembab Nisbi</span>
                    <span class="info-box-number">{{ $data['totalnisbis'] }} terentri</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
</div>
{{-- end of brief info --}}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <div class="box-title">Stasiun Tanah Miring</div>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>

                <div class="box-body">
                <canvas id="Hujan-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Hujan-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @foreach($data['tanahmiring'] as $hujan)
                                    "{{ $hujan['tanggal'] }}",
                                @endforeach
                            ],
                        datasets: [
                            {
                            label: "Hujan",
                            borderColor: 'green',
                            backgroundColor : 'lightgreen',
                            fill: true,
                            data: [
                                @foreach($data['tanahmiring'] as $hujan)
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
        {{-- End Of Stasiun Tanah Miring --}}
        <div class="col-md-6">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <div class="box-title">Stasiun Meteorologi Merauke</div>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>

                <div class="box-body">
                <canvas id="mopah-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("mopah-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @foreach($data['metmerauke'] as $hujan)
                                    "{{ $hujan['tanggal'] }}",
                                @endforeach
                            ],
                        datasets: [
                            {
                            label: "Hujan",
                            borderColor: 'green',
                            backgroundColor : 'lightgreen',
                            fill: true,
                            data: [
                                @foreach($data['metmerauke'] as $hujan)
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
    {{-- end of stasiun Met Merauke --}}
{{-- Stasiun Okaba --}}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <div class="box-title">Stasiun Okaba</div>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>

                <div class="box-body">
                <canvas id="okaba-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("okaba-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @foreach($data['okaba'] as $hujan)
                                    "{{ $hujan['tanggal'] }}",
                                @endforeach
                            ],
                        datasets: [
                            {
                            label: "Hujan",
                            borderColor: '#3C8DBC',
                            backgroundColor : 'lightgreen',
                            fill: true,
                            data: [
                                @foreach($data['okaba'] as $hujan)
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
        {{-- End Of Stasiun Okaba --}}
        <div class="col-md-6">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <div class="box-title">Stasiun Mimibaru</div>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>

                <div class="box-body">
                <canvas id="mimi-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("mimi-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @foreach($data['mimibaru'] as $hujan)
                                    "{{ $hujan['tanggal'] }}",
                                @endforeach
                            ],
                        datasets: [
                            {
                            label: "Hujan",
                            borderColor: '#3C8DBC',
                            backgroundColor : 'lightblue',
                            fill: true,
                            data: [
                                @foreach($data['mimibaru'] as $hujan)
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
    {{-- end of stasiun Mimibaru --}}
{{-- Stasiun Agats --}}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <div class="box-title">Stasiun Agats</div>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>

                <div class="box-body">
                <canvas id="agats-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("agats-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @foreach($data['agats'] as $hujan)
                                    "{{ $hujan['tanggal'] }}",
                                @endforeach
                            ],
                        datasets: [
                            {
                            label: "Hujan",
                            borderColor: '#F39C12',
                            backgroundColor : 'lightyellow',
                            fill: true,
                            data: [
                                @foreach($data['agats'] as $hujan)
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
        {{-- End Of Stasiun Okaba --}}
        <div class="col-md-6">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <div class="box-title">Stasiun Atsj</div>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>

                <div class="box-body">
                <canvas id="atsj-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("atsj-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @foreach($data['atsj'] as $hujan)
                                    "{{ $hujan['tanggal'] }}",
                                @endforeach
                            ],
                        datasets: [
                            {
                            label: "Hujan",
                            borderColor: '#F39C12',
                            backgroundColor : 'lightyellow',
                            fill: true,
                            data: [
                                @foreach($data['atsj'] as $hujan)
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
