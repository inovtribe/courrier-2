@extends('layouts.base')


@section('navbar')
<div class="nav-wrapper">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="fas fa-cog"></i>
          <span>Tableau de bord</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('all_mails_arrived') }}">
            <i class="fas fa-folder"></i>
          <span>Courriers arrivés</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('all_mails_outgoing') }}">
            <i class="fas fa-folder"></i>
          <span>Courriers départ</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('all_mails_internal') }}">
            <i class="fas fa-folder"></i>
          <span>Courriers internes</span>
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
@endsection

@section('content')

    <div class="container">
        <div class="col">
            <h3>Tous les courriers arrivés</h3>
            <div class="row">
              <div class="col" style="padding-top: 20px;">
                <a href="{{ route('add_arrived_mail') }}" class="btn btn-md btn-primary">Nouveau courier arrivé</a> 
              </div>
            </div>
            <span class="mb-0 mt-6" id="infoAlert"></span>
            <div class="card card-small mt-4 p-4 mb-4"> 
              
                <table class="table table-striped">

                    <thead>
                      <tr>
                        <th scope="col">Reférence</th>
                        <th scope="col">Objet</th>
                        <th scope="col">Type</th>
                        <th scope="col">Catégory</th>
                        <th scope="col">Date d'arrivéé</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($all_mails as $item)
                        <tr>
                          <td> {{ $item->reference }}</td>
                          <td> {{ $item->subject }} </td>
                          <td> {{ $item->type_id }} </td>
                          <td> {{ $item->category }} </td>
                          <td> {{ $item->mail_date_arrived }} </td>
                          <td> 
                            <div class="btn-group">
                              <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true", aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a href="/courrier/single/{{ $item->id }}/arrived" class="dropdown-item">
                                  Consulter
                                </a>
                                <a href="/courrier/single/{{ $item->id }}/delete" class="dropdown-item">
                                  Supprimer
                                </a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
    
    
            </div>
        </div>
    </div>

@endsection