<title>
    @yield('title')
</title>

<link rel="shortcut icon" type="imagen/x-icon" href="{{ asset('assets/img/web/uptaeb.jpg') }}">

<nav>  
    <ul class="navbar-nav navbar-dark bg-success" style="height: 60px;padding: 10px;">
        <li>
            <a class="navbar-brand" href="{{ route('Aulas.index') }}" style="color: white;">
                Aulas
            </a>
            <a class="navbar-brand" href="{{ route('Docentes.index') }}" style="color: white;">
                Docentes
            </a>
            <a class="navbar-brand" href="{{ route('Actividades.index') }}" style="color: white;">
                Actividades
            </a>
            <a class="navbar-brand" href="{{ route('Unidades_Curriculares.index') }}" style="color: white;">
                Unidades Currriculares
            </a>
        </li>
    </ul>
</nav>