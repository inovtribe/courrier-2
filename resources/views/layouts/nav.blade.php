<div class="nav-wrapper">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link " href="{{ route('home') }}" style="padding: 15px">
        {{-- <i class="fas fa-cog"></i> --}}
        <span>Tableau de bord</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('all_mails_arrived') }}" style="padding: 15px">
          {{-- <i class="fas fa-folder"></i> --}}
          <div style="display: inline-block;width: 100%;padding: 0px;">
            <div style="display: inline-block;width: 80%;float: left;">
              <span>Courriers arrivés</span>
            </div>
            <div style="display: inline-block;width: 15%;float: right;">
              <span class="badge badge-pill badge-info">{{ $courrier_arrived_count ? $courrier_arrived_count : 0 }}</span>
            </div>
          </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('all_mails_outgoing') }}" style="padding: 15px">
          {{-- <i class="fas fa-folder"></i> --}}
          <div style="display: inline-block;width: 100%;padding: 0px;">
            <div style="display: inline-block;width: 80%;float: left;">
              <span>Courriers départ</span>
            </div>
            <div style="display: inline-block;width: 15%;float: right;">
              <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span>
            </div>
          </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('all_mails_internal') }}" style="padding: 15px">
          {{-- <i class="fas fa-folder"></i> --}}
          <div style="display: inline-block;width: 100%;padding: 0px;">
            <div style="display: inline-block;width: 80%;float: left;">
              <span>Courriers internes</span>
            </div>
            <div style="display: inline-block;width: 15%;float: right;">
              <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span>
            </div>
          </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('valid_mails_arrived') }}" style="padding: 15px">
          {{-- <i class="fas fa-upload"></i> --}}
          <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>Courriers valide</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                <span class="badge badge-pill badge-info">{{ $courrier_valid_count ? $courrier_valid_count : 0 }}</span>
              </div>
          </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('all_my_mail') }}" style="padding: 15px">
      {{-- <a class="nav-link " href="#" style="padding: 15px"> --}}
          {{-- <i class="fas fa-upload"></i> --}}
          <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>Mes courriers (à traiter)</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                {{-- <span class="badge badge-pill badge-info">{{ $courrier_valid_count ? $courrier_valid_count : 0 }}</span> --}}
                <span class="badge badge-pill badge-info">{{ 0 }}</span>
              </div>
          </div>
      </a>
    </li>
    <li class="nav-item">
      {{-- <a class="nav-link " href="{{ route('valid_mails_arrived') }}" style="padding: 15px"> --}}
      <a class="nav-link " href="#" style="padding: 15px">
          {{-- <i class="fas fa-upload"></i> --}}
          <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>Mes courriers (traités)</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                {{-- <span class="badge badge-pill badge-info">{{ $courrier_valid_count ? $courrier_valid_count : 0 }}</span> --}}
                <span class="badge badge-pill badge-info">{{ 0 }}</span>
              </div>
          </div>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link " href="{{ route('not_treated_mails') }}" style="padding: 15px">
          {{-- <i class="fas fa-upload"></i> 
          <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>Courriers Non Traités</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span>
              </div>
          </div>
      </a>
    </li> --}}
    {{-- <li class="nav-item">
      <a class="nav-link " href="{{ route('treated_mails') }}" style="padding: 15px">
          {{-- <i class="fas fa-vr-cardboard"></i> 
          <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>Courriers Non Traités</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span>
              </div>
          </div>
          <span>Courriers Traités</span>
      </a>
    </li> --}}
    {{-- <li class="nav-item">
      <a class="nav-link " href="{{ route('archived_mails') }}" style="padding: 15px">
          {{-- <i class="far fa-square"></i> --
          <div style="display: inline-block;width: 100%;padding: 0px;">
            <div style="display: inline-block;width: 80%;float: left;">
              <span>Courriers Non Traités</span>
            </div>
            <div style="display: inline-block;width: 15%;float: right;">
              <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span>
            </div>
        </div>
        <span>Courriers Archivés</span>
      </a>
    </li> --}}
    {{-- <li class="nav-item">
      <a class="nav-link " href="{{ route('deleted_mails') }}" style="padding: 15px">
      {{-- <i class="far fa-images"></i> 
      <div style="display: inline-block;width: 100%;padding: 0px;">
          <div style="display: inline-block;width: 80%;float: left;">
            <span>Courriers Non Traités</span>
          </div>
          <div style="display: inline-block;width: 15%;float: right;">
            <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span>
          </div>
      </div>
      <span>Courriers Supprimés</span>
      </a>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link " href="{{ route('services') }}" style="padding: 15px">
      {{-- <i class="fas fa-crosshairs"></i> --}}
      <div style="display: inline-block;width: 100%;padding: 0px;">
          <div style="display: inline-block;width: 80%;float: left;">
            <span>Services</span>
          </div>
          <div style="display: inline-block;width: 15%;float: right;">
            <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span>
          </div>
      </div> 
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('contact') }}" style="padding: 15px">
      {{-- <i class="fas fa-crosshairs"></i> --}}
      <div style="display: inline-block;width: 100%;padding: 0px;">
          <div style="display: inline-block;width: 80%;float: left;">
            <span>Contact</span>
          </div>
          <div style="display: inline-block;width: 15%;float: right;">
            <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span>
          </div>
      </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('types') }}" style="padding: 15px">
      {{-- <i class="fas fa-crosshairs"></i> --}}
      <div style="display: inline-block;width: 100%;padding: 0px;">
          <div style="display: inline-block;width: 80%;float: left;">
            <span>Types de courrier</span>
          </div>
          <div style="display: inline-block;width: 15%;float: right;">
            <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span>
          </div>
      </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('manage_user_list') }}" style="padding: 15px">
      {{-- <i class="fas fa-exchange-alt"></i> --}}
      <div style="display: inline-block;width: 100%;padding: 0px;">
          <div style="display: inline-block;width: 80%;float: left;">
            <span>Gestion des utilisateurs</span>
          </div>
          <div style="display: inline-block;width: 15%;float: right;">
            {{-- <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span> --}}
          </div>
      </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('profile') }}" style="padding: 15px">
      {{-- <i class="fas fa-exchange-alt"></i> --}}
      <div style="display: inline-block;width: 100%;padding: 0px;">
          <div style="display: inline-block;width: 80%;float: left;">
            <span>Profile</span>
          </div>
          <div style="display: inline-block;width: 15%;float: right;">
            {{-- <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span> --}}
          </div>
      </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('settings') }}" style="padding: 15px">
        {{-- <i class="fas fa-cog"></i> --}}
        <div style="display: inline-block;width: 100%;padding: 0px;">
            <div style="display: inline-block;width: 80%;float: left;">
              <span>Configurations</span>
            </div>
            <div style="display: inline-block;width: 15%;float: right;">
              {{-- <span class="badge badge-pill badge-info">{{ $variable ? $variable : 0 }}</span> --}}
            </div>
        </div>
      </a>
    </li>
  </ul>
</div>