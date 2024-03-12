<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>Epstein Island</title>

        <!-- CSS FILES -->      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">

        <link href="{{asset('css/apexcharts.css')}}" rel="stylesheet">

        <link href="{{asset('css/tooplate-mini-finance.css')}}" rel="stylesheet">
<!--

Tooplate 2135 Mini Finance

https://www.tooplate.com/view/2135-mini-finance

Bootstrap 5 Dashboard Admin Template

-->

    </head>
    
    <body>
        <header class="navbar sticky-top flex-md-nowrap">
            <div class="col-md-3 col-lg-3 me-0 px-3 fs-6">
                <a class="navbar-brand" href="{{route('dashboard')}}">
                    <i class="bi-box"></i>
                    LOOR
                </a>
            </div>

            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            

            
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                    <div class="position-sticky py-4 px-2 sidebar-sticky">
                        <ul class="nav flex-column h-100">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">
                                    <i class="bi-house-fill me-2"></i>
                                    Inicio
                                </a>
                            </li>



                            <li class="nav-item">
                            
                             <a class="nav-link" href="{{ route('cursos.index') }}">CURSOS</a>
                             
                                    </i>
                                    </li>
                                    
                                    <li class="nav-item">
                                    
                                    <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                            </li>

                           

                            <li class="nav-item border-top mt-auto pt-2">
                            <form method="POST" action="{{ route('logout') }}">
                            <i class="bi-box-arrow-left me-2"></i>
                              @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar Sesion') }}
                                </a>
                            </li>
                            </x-dropdown-link>
                        </form>
                              



                    </ul>

                </div>

            </nav>


                                <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-ñg-9 px-md-4 border-start">
                                <div class="tittle-group mb-3">
                                <h4 class="text-center mb-0">Area de Trabajo</h4>
                                  @yield('content')

                                </section>
                          </main>
                   
</div>
            </div>
        </div>

        <!-- JAVASCRIPT FILES -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/apexcharts.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>

        <script type="text/javascript">
            var options = {
              series: [13, 43, 22],
              chart: {
              width: 380,
              type: 'pie',
            },
            labels: ['Balance', 'Expense', 'Credit Loan',],
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
            };

            var chart = new ApexCharts(document.querySelector("#pie-chart"), options);
            chart.render();
        </script>

        <script type="text/javascript">
            var options = {
              series: [{
              name: 'Income',
              data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
              name: 'Expense',
              data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
              name: 'Transfer',
              data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
              chart: {
              type: 'bar',
              height: 350
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
              },
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
            },
            xaxis: {
              categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
              title: {
                text: '$ (thousands)'
              }
            },
            fill: {
              opacity: 1
            },
            tooltip: {
              y: {
                formatter: function (val) {
                  return "$ " + val + " thousands"
                }
              }
            }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>

    </body>
</html>