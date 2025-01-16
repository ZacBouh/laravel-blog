<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- BootStrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- End BootStrap  --}}
    <title>@yield('title')</title>
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh;">
    <div class="container bg-body-secondary" style="display: flex; align-items: flex-end; padding: 25px; " >
        <h1>
            This is the header
        </h1>
        <nav>
            <ul style="display: flex; list-style: none; gap: 15px;">
                <li>Home</li>
                <li>Categories</li>
                <li>Contact</li>
            </ul>
        </nav>
    </div>

    <div class="container" style="display: flex; flex-direction: column; flex-grow: 1;" >
        @yield('body')
        
        
    </div>
    <footer class=" container bg-body-secondary" style="min-height: 50px;">
        HERE IS THE FOOTER
    </footer>
</body>
</html>