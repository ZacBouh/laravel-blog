<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Select2 --}}
        <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

        <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    {{-- End Select2 --}}

    
    <title>@yield('title')</title>
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh;">
    <div class="container bg-body-secondary" style="display: flex; align-items: flex-end; padding: 25px; " >
        <h1>
            This is the header
        </h1>
        <nav  >
            <ul class="navbar-nav" style="display: flex; list-style: none; gap: 15px; flex-direction: row;">
                <li class="nav-item dropdown" >
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