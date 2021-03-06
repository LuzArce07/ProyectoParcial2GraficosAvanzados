<!DOCTYPE html>
<html>
    

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('titulo')</title>

    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" >

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link href="{{ asset('assets/fonts/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css" >

    
    @yield('estilos')
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{route('admin.dashboard')}}">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-bong"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Laboratorios <br> AJ</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('muestreos.index')}}"><i class="fas fa-table"></i><span>Lista Muestreos</span></a></li>
                    
                    @if(Auth::user()->id_tipo_usuario == 1)
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('usuarios.index')}}#"><i class="fas fa-user-circle"></i><span>Lista Usuarios</span></a></li>
                    @endif
                    
                </ul>
                
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2020</span></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            
                            <!--
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="badge badge-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-envelope fa-fw"></i><span class="badge badge-danger badge-counter">7</span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            -->
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">{{Auth::user()->name}}</span><img class="border rounded-circle img-profile" src="{{ asset('assets/img/avatars/avatar1.jpeg') }}"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" role="presentation" href="{{route('logout')}}" id="linkLogout" >
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                &nbsp;Logout
                                            </a>
                                            <form id="formLogout" action="{{route('logout')}}" method="POST">
                                                @csrf
                                            </form>
                                    </div>
                    </div>
                    </li>
                    </ul>
            </div>
            @yield('breadcrumbs')
            </nav>


            
            <div class="container-fluid">
            

                
                @yield('contenido') 
               
                
                
            </div>
            
            
            <!--<div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Projects</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Server migration<span class="float-right">20%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Sales tracking<span class="float-right">40%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Customer Database<span class="float-right">60%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Payout Details<span class="float-right">80%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Account setup<span class="float-right">Complete!</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Todo List</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">10:30 AM</span></div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="formCheck-1"><label class="custom-control-label" for="formCheck-1"></label></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">11:30 AM</span></div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="formCheck-2"><label class="custom-control-label" for="formCheck-2"></label></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">12:30 AM</span></div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="formCheck-3"><label class="custom-control-label" for="formCheck-3"></label></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card text-white bg-primary shadow">
                                <div class="card-body">
                                    <p class="m-0">Primary</p>
                                    <p class="text-white-50 small m-0">#4e73df</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card text-white bg-success shadow">
                                <div class="card-body">
                                    <p class="m-0">Success</p>
                                    <p class="text-white-50 small m-0">#1cc88a</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card text-white bg-info shadow">
                                <div class="card-body">
                                    <p class="m-0">Info</p>
                                    <p class="text-white-50 small m-0">#36b9cc</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card text-white bg-warning shadow">
                                <div class="card-body">
                                    <p class="m-0">Warning</p>
                                    <p class="text-white-50 small m-0">#f6c23e</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card text-white bg-danger shadow">
                                <div class="card-body">
                                    <p class="m-0">Danger</p>
                                    <p class="text-white-50 small m-0">#e74a3b</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card text-white bg-secondary shadow">
                                <div class="card-body">
                                    <p class="m-0">Secondary</p>
                                    <p class="text-white-50 small m-0">#858796</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            
        </div><br>
        
            
        
    </div>
    
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('assets/js/chart.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('assets/js/bs-init.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    
    <script type="text/javascript" src="{{ asset('assets/js/theme.js') }}"></script>

    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    

    <script>

        function doClickLinkLogout(e) {

            e.preventDefault();
            $("#formLogout").submit();

        }

        $(function() {
            $("#linkLogout").click(doClickLinkLogout);
        });
    </script>

    @yield('scripts')

</body>

</html>