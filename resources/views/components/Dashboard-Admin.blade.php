<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>ElectroCity</title>
    <link rel="icon" href="{{ asset('images/Logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    {{--  --}}
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="sb-nav-fixed  " id="page-top">
    @if (session()->has('success'))
        <x-alert type='success'>
            {{ session('success') }}
        </x-alert>
    @endif
    <div id="wrapper" class="bg-side">
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-text mx-3 gold-color">ElectroCity </div>
            </a>
            <hr class="sidebar-divider my-0" />

            <li class="nav-item ">
                <a class="nav-link" href="{{ route('ADM') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </div>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('products') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-house"></i>
                        Homepage
                    </div>
                </a>
            </li>

            <hr class="sidebar-divider" />

            <div class="sidebar-heading">Interface</div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-brands fa-product-hunt"></i>
                    <span>Products</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-nav py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Products</h6>
                        <a class="nav-link white-color" href="{{ route('AllPrd') }}">
                            All Products
                        </a>
                        <a class="nav-link white-color" href="{{ route('create') }}">

                            Add Product
                        </a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('AllOrder') }}">
                    All Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('AddCat') }}">
                    Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('messages') }}">
                    All Messages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('clients') }}">
                    All Clients
                </a>
            </li>

            <hr class="sidebar-divider" />


            <hr class="sidebar-divider d-none d-md-block" />

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="bg-content">
                <nav class="navbar navbar-expand bg-nav  topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 gold-color">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw gold-color"></i>
                                <span class="badge badge-danger badge-counter">{{ $totalcontact }}</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header white-color">Message Center</h6>
                                <a class="dropdown-item " href="#">
                                    <div class=" font-weight-bold">
                                        @foreach ($messages as $message)
                                            <div class="d-flex">
                                                <div class="dropdown-list-image mr-3">
                                                    <img class="rounded-circle"
                                                        src="{{ asset('img/undraw_profile_3.svg') }}"
                                                        alt="..." />
                                                    <div class="status-indicator bg-success"></div>
                                                </div>
                                                <div class="">
                                                    <div class="text-truncate">
                                                        {{ $message->fullname }}
                                                    </div>
                                                    <div class="small text-gray-500">
                                                        {{ $message->subject }} · 58m
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500"
                                    href="{{ route('messages') }}">Read More
                                    Messages</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small fw-bold">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('images/' . auth()->user()->image) }}" />
                            </a>
                            <div class="dropdown-menu bx-model bg-black dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{--  --}}
                                {{--  --}}
                                <a class="dropdown-item white-color"
                                    href="{{ route('details', [auth()->user()->email, auth()->user()->name]) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 "></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item white-color" href="{{ route('logout') }}"
                                    data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <main class="container-fluid ">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-black">
                <div class="modal-header">
                    <h5 class="modal-title gold-color" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close gold-color" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer text-center">
                    <button class="btn bg-btnn" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                    <button class="btn bg-btnn lg ">
                        <a  class="white-color" href="{{ route('logout') }}">Logout</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
