@extends('admin.layouts.app', ['activePage' => 'admin.dashboard', 'title' => 'Yogha - Admin v1.0.0 - Dashboard', 'navName' => 'Estatísticas', 'activeButton' => 'admin.dashboard'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                @env('local')
                    <div class="col-md-3 ">
                        <div class="card alert-warning" style="background: orange; color: white; ">
                            <div class="card-header " style="background: orange; color: white;>
                                <h4 class="card-title">Ambiente</h4>
                            </div>
                            <div class="card-body ">
                                <h1>Testes</h1>
                            </div>
                        </div>
                    </div>
                @endenv

                @env('production')
                    <div class="col-md-3">
                        <div class="card alert-success" style="background: #549820; color: white;">
                            <div class="card-header" style="background: #549820; color: white;">
                                <h4 class="card-title" style="color:white;">Ambiente</h4>
                            </div>
                            <div class="card-body ">
                                <h1>Produção</h1>
                            </div>
                        </div>
                    </div>
                @endenv

                <div class="col-md-3">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Acomodações</h4>
                        </div>
                        <div class="card-body ">
                            <h1>{{$accommodations}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Serviços</h4>
                        </div>
                        <div class="card-body ">
                            <h1>{{$services}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Usuários</h4>
                        </div>
                        <div class="card-body ">
                            <h1>{{$users}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Reservas</h4>
                        </div>
                        <div class="card-body ">
                            <div id="chartBooking" class="ct-chart"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> dados
                                <i class="fa fa-circle text-danger"></i> dados
                                <i class="fa fa-circle text-warning"></i> dados
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> <span class="alert-danger">Dados falsos, apenas para apresentação do gráfico, verificar api para dados reais</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            var dataSales = {
                labels: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM'],
                series: [
                    [287, 385, 490, 492, 554, 586, 698, 695, 752, 788, 846, 944],
                    [67, 152, 143, 240, 287, 335, 435, 437, 539, 542, 544, 647],
                    [23, 113, 67, 108, 190, 239, 307, 308, 439, 410, 410, 509]
                ]
            };

            var optionsSales = {
                lineSmooth: false,
                low: 0,
                high: 800,
                showArea: true,
                height: "245px",
                axisX: {
                    showGrid: false,
                },
                lineSmooth: Chartist.Interpolation.simple({
                    divisor: 3
                }),
                showLine: false,
                showPoint: false,
            };

            var responsiveSales = [
                ['screen and (max-width: 640px)', {
                    axisX: {
                        labelInterpolationFnc: function (value) {
                            return value[0];
                        }
                    }
                }]
            ];

            Chartist.Line('#chartBooking', dataSales, optionsSales, responsiveSales);

        });
    </script>
@endpush
