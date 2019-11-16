<div class="nav-wrapper">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link " href="{{ route('dashboard') }}">
        <i class="fas fa-cog"></i>
        <span>Tableau de bord</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('all_mails') }}">
          <i class="fas fa-folder"></i>
        <span>Tous les Courriers</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="{{ route('not_treated_mails') }}" disabled>
          <i class="fas fa-upload"></i>
        <span>Courriers Non Traités</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('treated_mails') }}">
          <i class="fas fa-vr-cardboard"></i>
          <span>Courriers Traités</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('archived_mails') }}">
          <i class="far fa-square"></i>
        <span>Courriers Archivés</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('deleted_mails') }}">
      <i class="far fa-images"></i>
      <span>Courriers Supprimés</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('services') }}">
      <i class="fas fa-crosshairs"></i>
      <span>Services</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('contact') }}">
      <i class="fas fa-crosshairs"></i>
      <span>Contact</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('types') }}">
      <i class="fas fa-crosshairs"></i>
      <span>Types de courrier</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('profile') }}">
      <i class="fas fa-exchange-alt"></i>
      <span>Profile</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('settings') }}">
        <i class="fas fa-cog"></i>
        <span>Configuration</span>
      </a>
    </li>
  </ul>
</div>