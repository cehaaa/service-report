<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <script src="sw/sweetalert.min.js" defer></script>
    <script src="js/sw.js" defer></script>

    @yield('script')

</head>
<body class=" bg-light">
    
    <nav class="navbar navbar-expand navbar-light bg-dark">
        <a href="/" class="navbar-brand text-light">Service</a>
        <ul class="nav">
            <li class="nav-item">
                <a href="/terimaservice" class="nav-link text-light text-decoration-none">Terima Service</a>
            </li>
            <li class="nav-item">
                <a href="/cekdataservice" class="nav-link text-light text-decoration-none">Cek Data Service</a>
            </li>
            <li class="nav-item">
                <a href="/serviceselesai" class="nav-link text-light text-decoration-none">Service Selesai</a>
            </li>
        </ul>
    </nav>

    @yield('content')

    @yield('print')

</body>
</html>