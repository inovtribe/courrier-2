<div class="nav-wrapper">
  <ul class="nav flex-column">
    @if ($role === 'SG')
      <li class="nav-item">
        <a class="nav-link " href="{{ route('home') }}" style="padding: 15px">
          {{-- <i class="fas fa-cog"></i> --}}
          <span>Statistiques</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('all_mails') }}" style="padding: 15px">
            {{-- <i class="fas fa-folder"></i> --}}
            <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>Tous les courriers</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                <span class="badge badge-pill badge-light text-primary">
                  {{ $all_courrier_count }}
                </span>
              </div>
            </div>
        </a>
      </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" href="{{ route('all_mails_arrived') }}" style="padding: 15px">
          {{-- <i class="fas fa-folder"></i> --}}
          <div style="display: inline-block;width: 100%;padding: 0px;">
            <div style="display: inline-block;width: 80%;float: left;">
              <span>Courriers arrivés</span>
            </div>
            <div style="display: inline-block;width: 15%;float: right;">
              <span class="badge badge-pill badge-light text-primary">
                {{ $profile->roles === 'AT' || $profile->roles === 'SG' || $profile->roles === 'ADMIN' ? 
                  $courriers_userarrived_count : $courrier_arrived_count 
                }}
              </span>
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
              <span class="badge badge-pill badge-light text-primary">{{ $variable ? $variable : 0 }}</span>
            </div>
          </div>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link " href="{{ route('all_mails_internal') }}" style="padding: 15px">
          <i class="fas fa-folder"></i>
          <div style="display: inline-block;width: 100%;padding: 0px;">
            <div style="display: inline-block;width: 80%;float: left;">
              <span>Courriers internes</span>
            </div>
            <div style="display: inline-block;width: 15%;float: right;">
              <span class="badge badge-pill badge-light text-primary">{{ $variable ? $variable : 0 }}</span>
            </div>
          </div>
      </a>
    </li> --}}
    @if ($role === 'SG' || $role === 'SC')
    <li class="nav-item">
      <a class="nav-link " href="{{ route('valid_mails_arrived') }}" style="padding: 15px">
          {{-- <i class="fas fa-upload"></i> --}}
          <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>Courriers valide</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                <span class="badge badge-pill badge-light text-primary">{{ $courrier_valid_count ? $courrier_valid_count : 0 }}</span>
              </div>
          </div>
      </a>
    </li>
    @endif
    @if ($role === 'SG' || $role === 'AT')
    <li class="nav-item">
      <a class="nav-link " href="{{ route('all_my_mail') }}" style="padding: 15px">
      {{-- <a class="nav-link " href="#" style="padding: 15px"> --}}
          {{-- <i class="fas fa-upload"></i> --}}
          <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>Courriers en traitement</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                <span class="badge badge-pill badge-light text-primary">{{ $mes_courriers_a_traite ? $mes_courriers_a_traite : 0 }}</span>
                {{-- <span class="badge badge-pill badge-light text-primary">{{ 0 }}</span> --}}
              </div>
          </div>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link " href="{{ route('valid_mails_arrived') }}" style="padding: 15px">
      <a class="nav-link " href="#" style="padding: 15px">
          <i class="fas fa-upload"></i>
          <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>En attente d'avis</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                <span class="badge badge-pill badge-light text-primary">{{ $courrier_valid_count ? $courrier_valid_count : 0 }}</span>
                <span class="badge badge-pill badge-light text-primary">{{ 0 }}</span>
              </div>
          </div>
      </a>
    </li> --}}
    {{-- <li class="nav-item">
      <a class="nav-link " href="{{ route('not_treated_mails') }}" style="padding: 15px">
          {{-- <i class="fas fa-upload"></i> 
          <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>Courriers Non Traités</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                <span class="badge badge-pill badge-light text-primary">{{ $variable ? $variable : 0 }}</span>
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
                <span class="badge badge-pill badge-light text-primary">{{ $variable ? $variable : 0 }}</span>
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
              <span class="badge badge-pill badge-light text-primary">{{ $variable ? $variable : 0 }}</span>
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
            <span class="badge badge-pill badge-light text-primary">{{ $variable ? $variable : 0 }}</span>
          </div>
      </div>
      <span>Courriers Supprimés</span>
      </a>
    </li> --}}
    <li class="nav-item">
      {{-- <a class="nav-link " href="{{ route('valid_mails_arrived') }}" style="padding: 15px"> --}}
      <a class="nav-link " href="{{ route('all_folders') }}" style="padding: 15px">
          {{-- <i class="fas fa-upload"></i> --}}
          <div style="display: inline-block;width: 100%;padding: 0px;">
              <div style="display: inline-block;width: 80%;float: left;">
                <span>Dossiers</span>
              </div>
              <div style="display: inline-block;width: 15%;float: right;">
                <span class="badge badge-pill badge-light text-primary">{{ $folders_count ? $folders_count : 0 }}</span>
                {{-- <span class="badge badge-pill badge-light text-primary">{{ 0 }}</span> --}}
              </div>
          </div>
      </a>
    </li>
    @endif
    <li class="nav-item">
      <a class="nav-link " href="{{ route('avis_request_all') }}" style="padding: 15px">
      {{-- <i class="fas fa-crosshairs"></i> --}}
      <div style="display: inline-block;width: 100%;padding: 0px;">
          <div style="display: inline-block;width: 80%;float: left;">
            <span>Demandes d'avis</span>
          </div>
          <div style="display: inline-block;width: 15%;float: right;">
            <span class="badge badge-pill badge-light text-primary">{{ $demande_avis_count ? $demande_avis_count : 0 }}</span>
          </div>
      </div> 
      </a>
    </li>
    
    @if ($role === 'SG' || $role === 'AT' || $role === 'SC')
      <li class="nav-item">
        <a class="nav-link " href="{{ route('avis_request_all') }}" style="padding: 15px">
        {{-- <i class="fas fa-crosshairs"></i> --}}
        <div style="display: inline-block;width: 100%;padding: 0px;">
            <div style="display: inline-block;width: 80%;float: left;">
              <span>Mes parapheurs</span>
            </div>
            <div style="display: inline-block;width: 15%;float: right;">
              {{-- <span class="badge badge-pill badge-light text-primary">{{ $demande_avis_count ? $demande_avis_count : 0 }}</span> --}}
            </div>
        </div> 
        </a>
      </li>
    @endif

    {{-- <li class="nav-item">
      <a class="nav-link " href="{{ route('avis_request_all') }}" style="padding: 15px">
      <i class="fas fa-crosshairs"></i>
      <div style="display: inline-block;width: 100%;padding: 0px;">
          <div style="display: inline-block;width: 80%;float: left;">
            <span>Mes avis</span>
          </div>
          <div style="display: inline-block;width: 15%;float: right;">
            <span class="badge badge-pill badge-light text-primary">{{ $demande_avis_count ? $demande_avis_count : 0 }}</span>
          </div>
      </div> 
      </a>
    </li> --}}
    @if ($role === 'ADMIN')
      <li class="nav-item">
        <a class="nav-link " href="{{ route('services') }}" style="padding: 15px">
        {{-- <i class="fas fa-crosshairs"></i> --}}
        <div style="display: inline-block;width: 100%;padding: 0px;">
            <div style="display: inline-block;width: 80%;float: left;">
              <span>Services</span>
            </div>
            <div style="display: inline-block;width: 15%;float: right;">
              {{-- <span class="badge badge-pill badge-light text-primary">{{ $service_count ? $service_count : 0 }}</span> --}}
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
              {{-- <span class="badge badge-pill badge-light text-primary">{{ $contact_count ? $contact_count : 0 }}</span> --}}
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
              {{-- <span class="badge badge-pill badge-light text-primary">{{ $courrier_type_count ? $courrier_type_count : 0 }}</span> --}}
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
              {{-- <span class="badge badge-pill badge-light text-primary">{{ $variable ? $variable : 0 }}</span> --}}
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
                {{-- <span class="badge badge-pill badge-light text-primary">{{ $variable ? $variable : 0 }}</span> --}}
              </div>
          </div>
        </a>
      </li>
    @endif
  </ul>
</div>