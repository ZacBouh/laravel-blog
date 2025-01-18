<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Font --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- End Font --}}
    {{-- Select2 --}}
        <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

        <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script> --}}
    {{-- End Select2 --}}

    {{-- select2 --}}
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>

        .color-custom-primary {
            color: #004D40;
        }

        .bg-custom-secondary {
            background: #FAFAFA;
        }
        .button {
            border-radius: 8px; 
        }

        .bg-custom {
            background: #FFC107;
        }
        .bg-custom-button {
            background: #FFA000;
            color: white;
        }
        .bg-custom-button:hover {
            background: #FFB300;
            color: white;
        }

        .bg-danger {
            background: #F44336;
            color: white;
        }

        .article-card-header {
            background: #E0F7FA;
        }

        .md-padding {
            padding: 15px;
        }

        .article-title {
            color: #004D40;
            font-weight: 700;
        }

        .separator {
            max-width: 50%;
            height: 1px;
            border-bottom: 1px solid #FF9800 ;
            place-self: center;
            margin-left: 50%;
        }

        .tag-container {
            min-height: 25px; 
            padding: 0.25em 0.5em 0.5em 0.5em;
        }

        .bg-badge {
            background: #FF9800;
            color: white;
        }

        .select2-search__field {
            display: none;
            height: 1px;
        }
        .select2-search--inline {
            display: none;
            height: 1px;
            
        }

        .filter-placeholder::after {
            content: 'Filtrer';
            position:relative;
            color: grey;
            top: 6px;
            left: 4px;
        }

        .nav-link {
            color: #004D40;
            font-weight: 600;
            margin-right: -10px; 
        }
        .nav-link::after {
            color: transparent;
        }

    </style>
    
    <title>@yield('title')</title>
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh;  ">
    <div class="container bg-body-secondary" style="display: flex; align-items: center; padding: 25px; justify-content: space-between; background: linear-gradient(to bottom, #FFC107, transparent )" >
        <h1 class="color-custom-primary" style="font-weight: 700;" >
            Laravel Blog
        </h1>
        <nav  style="" >
            <ul class="navbar-nav " style="display: flex; list-style: none; gap: 15px; flex-direction: row;">
                <li class="nav-item dropdown " >
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Articles
                    </a>
                    <ul class="dropdown-menu" >
                        <li><a  href="{{ route('articles.index') }}">Liste  </a></li>
                        <li><a  href="{{ route('articles.create') }}">Créer</a></li>
                    </ul>
                </li> 
                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tags
                    </a>
                    <ul class="dropdown-menu" >
                        <li><a  href="{{ route('tags.index') }}">Liste</a></li>
                        <li><a  href="{{ route('tags.create') }}">Créer</a></li>
                    </ul>
                </li> 
                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Contact
                    </a>
                    <ul class="dropdown-menu" >
                        <li><a  href="{{ route('messages.create') }}">Écrire un message</a></li>
                        <li><a  href="#">LinkedIn</a></li>
                    </ul>
                </li> 
                
            </ul>
        </nav>
    </div>

    <div class="container" style="display: flex; flex-direction: column; flex-grow: 1;" >
        <h2>
            @yield('body_title', 'Body Title')
        </h2>
        @yield('body')
        
        
    </div>
    <footer class=" container bg-body-secondary" style="min-height: 50px;">
        HERE IS THE FOOTER
    </footer>
</body>
@stack('script')
</html>