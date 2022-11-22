<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }} {{ request()->is('home') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-home"></i>
        <p>Inicio</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('noticia.index') }}" class="nav-link {{ request()->is('Noticia*') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>Noticias</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('documento.index') }}" class="nav-link {{ request()->is('Documento*') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-book"></i>
        <p>Documentos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('campeonato.index') }}" class="nav-link {{ request()->is('campeonato*') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-trophy"></i>
        <p>Campeonatos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('partidos.index') }}" class="nav-link {{ request()->is('partidos*') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-futbol"></i>
        <p>Partidos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('fixturefinal.index') }}" class="nav-link {{ request()->is('fixturefinal*') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fab fa-megaport"></i>
        <p>Fixture</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('equipos.index') }}" class="nav-link {{ request()->is('equipos*') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-users-cog"></i>
        <p>Equipos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('jugadores.index') }}" class="nav-link {{ request()->is('jugadores*') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-male"></i>
        <p>Jugadores</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('sanciones.index') }}" class="nav-link {{ request()->is('sanciones*') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-user-tag"></i>
        <p>Sanciones</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('tabposicion.index') }}" class="nav-link {{ request()->is('tabposicion*') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-sort-amount-up"></i>
        <p>Tablero de Posiciones</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('categorias.index') }}" class="nav-link {{ request()->is('categorias*') ? 'active' : '' }}" style="color:white;">
        <i class="nav-icon fas fa-envelope-open-text"></i>
        <p>Categorias</p>
    </a>
</li>
