<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat');

/*-------------------------------- END ----*/
    #body-row {
        margin-left: 0;
        margin-right: 0;
    }

    #sidebar-container {
        min-height: 100vh;
        background-color: #132644;
        padding: 0;
        /* flex: unset; */
    }

    .sidebar-expanded {
        width: 230px;
    }

    .sidebar-collapsed {
        /*width: 60px;*/
        width: 100px;
    }

    /* ----------| Menu item*/
    #sidebar-container .list-group a {
        height: 50px;
        color: white;
    }

    /* ----------| Submenu item*/
    #sidebar-container .list-group li.list-group-item {
        background-color: #132644;
    }

    #sidebar-container .list-group .sidebar-submenu a {
        height: 45px;
        padding-left: 30px;
    }

    .sidebar-submenu {
        font-size: 0.9rem;
    }

    /* ----------| Separators */
    .sidebar-separator-title {
        background-color: #132644;
        height: 35px;
    }

    .sidebar-separator {
        background-color: #132644;
        height: 25px;
    }

    .logo-separator {
        background-color: #132644;
        height: 60px;
    }

    a.bg-dark {
        background-color: #132644 !important;
    }

    </style>
</head>
<body>
    <div class="container-fluid p-0">

        <!-- Bootstrap row -->
        <div class="row" id="body-row">
            <!-- Sidebar -->
            <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
                <!-- Bootstrap List Group -->
                <ul class="list-group">
                    <!-- Separator with title -->
                    <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                        <small>MAIN MENU</small>
                    </li>
                    <!-- /END Separator -->
                    <!-- Menu with submenu -->
                    <a href="{{ route('home') }}" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-dashboard fa-fw mr-3"></span>
                            <span class="menu-collapsed">Dashboard</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    <!-- Submenu content -->
                    <div id='submenu1' class="collapse sidebar-submenu">
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Charts</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Reports</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Tables</span>
                        </a>
                    </div>
                    <a href="{{ route('blogs.index') }}" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-user fa-fw mr-3"></span>
                            <span class="menu-collapsed">Blogs</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    <!-- Submenu content -->
                    <div id='submenu2' class="collapse sidebar-submenu">
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Settings</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Password</span>
                        </a>
                    </div>
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nav-button" style="cursor: pointer;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            @csrf
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-tasks fa-fw mr-3"></span>
                            <span class="menu-collapsed">Logout</span>
                        </div>
                        </form>
                    </a>
                    <!-- Separator with title -->
                    <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                        <small>OPTIONS</small>
                    </li>
                    <!-- /END Separator -->
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-calendar fa-fw mr-3"></span>
                            <span class="menu-collapsed">Calendar</span>
                        </div>
                    </a>
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-envelope-o fa-fw mr-3"></span>
                            <span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>
                        </div>
                    </a>
                    <!-- Separator without title -->
                    <li class="list-group-item sidebar-separator menu-collapsed"></li>
                    <!-- /END Separator -->
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-question fa-fw mr-3"></span>
                            <span class="menu-collapsed">Help</span>
                        </div>
                    </a>
                    <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                            <span id="collapse-text" class="menu-collapsed">Collapse</span>
                        </div>
                    </a>
                    <!-- Logo -->
                    <li class="list-group-item logo-separator d-flex justify-content-center">
                        <img src='https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg' width="30" height="30" />
                    </li>
                </ul><!-- List Group END-->
            </div><!-- sidebar-container END -->


</body>
</html>
