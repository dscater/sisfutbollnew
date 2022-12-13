<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}"
        class="nav-link {{ request()->is('home') ? 'active' : '' }} {{ request()->is('home') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-home"></i>
        <p>Inicio</p>
    </a>
</li>
<li class="nav-header bg-dark">
    ADMINISTRACIÓN
</li>
<li class="nav-item">
    <a href="{{ route('noticia.index') }}" class="nav-link {{ request()->is('Noticia*') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>Noticias</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('documento.index') }}" class="nav-link {{ request()->is('Documento*') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-book"></i>
        <p>Documentos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('campeonato.index') }}" class="nav-link {{ request()->is('campeonato*') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-trophy"></i>
        <p>Campeonatos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('partidos.index') }}" class="nav-link {{ request()->is('partidos*') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-futbol"></i>
        <p>Partidos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('fixturefinal.index') }}" class="nav-link {{ request()->is('fixturefinal*') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fab fa-megaport"></i>
        <p>Fixture</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('equipos.index') }}" class="nav-link {{ request()->is('equipos*') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-users-cog"></i>
        <p>Equipos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('jugadores.index') }}" class="nav-link {{ request()->is('jugadores*') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-male"></i>
        <p>Jugadores</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('sanciones.index') }}" class="nav-link {{ request()->is('sanciones*') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-user-tag"></i>
        <p>Sanciones</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('tabposicion.index') }}" class="nav-link {{ request()->is('tabposicion*') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-sort-amount-up"></i>
        <p>Tablero de Posiciones</p>
    </a>
</li>
@if (Auth::user()->tipo == 'ADMINISTRADOR')
    <li class="nav-item">
        <a href="{{ route('categorias.index') }}" class="nav-link {{ request()->is('categorias*') ? 'active' : '' }}"
            style="color:white;">
            <i class="nav-icon fas fa-envelope-open-text"></i>
            <p>Categorias</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}"
            style="color:white;">
            <i class="nav-icon fas fa-users"></i>
            <p>Usuarios</p>
        </a>
    </li>
@endif
<li class="nav-header bg-dark">
    REPORTES
</li>
<li class="nav-item">
    <a href="{{ route('reportes.tarjeta_jugador') }}"
        class="nav-link {{ request()->is('reportes/tarjeta_jugador') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-file-pdf"></i>
        <p>Tarjeta de jugador</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('reportes.jugador') }}" class="nav-link {{ request()->is('reportes/jugador') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-file-pdf"></i>
        <p>Jugador</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('reportes.equipos_categoria') }}"
        class="nav-link {{ request()->is('reportes/equipos_categoria') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-file-pdf"></i>
        <p>Equipos por categoría</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('reportes.fixture') }}" class="nav-link {{ request()->is('reportes/fixture') ? 'active' : '' }}"
        style="color:white;">
        <i class="nav-icon fas fa-file-pdf"></i>
        <p>Fixture</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('reportes.jugadores_equipo') }}"
        class="nav-link {{ request()->is('reportes/jugadores_equipo') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-file-pdf"></i>
        <p>Jugadores por equipo</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('reportes.sanciones') }}"
        class="nav-link {{ request()->is('reportes/sanciones') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-file-pdf"></i>
        <p>Sanciones</p>
    </a>
</li>
