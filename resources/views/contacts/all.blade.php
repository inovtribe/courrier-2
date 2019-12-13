@extends('layouts.base')

@section('content')

    <h2>Tous les contacts</h2>

    <div class="row">
        <div class="col">
            <div class="row">
              <div class="col" style="padding-top: 20px;">
                <a href="{{ route('add_contact') }}" class="btn btn-md btn-primary">Nouveau contact</a> 
              </div>
            </div>
            <span class="mb-0 mt-6" id="infoAlert"></span>
            <div class="card card-small mt-4 p-4 mb-4"> 
              
                <table class="table table-striped">

                    <thead>
                      <tr>
                        <th scope="col">Nom et prénom</th>
                        <th scope="col">Adresse mail</th>
                        <th scope="col">N° de téléphone</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($personal_contact as $contact)
                        <tr>
                          <td> {{ $contact->first_name }} {{ $contact->last_name }} </td>
                          <td> {{ $contact->email }} </td>
                          <td> {{ $contact->phone }} </td>
                          <td> {{ $contact->address }} </td>
                          <td> 
                            <a href="#" class="btn btn-primary">Consulter</a> 
                            <a href="{{ route('delete_contact',$contact->id) }}" class="btn btn-danger">Supprimer</a> 
                          </td>
                        </tr>
                      @endforeach
    
                    </tbody>
                </table>
            </div>

            <div class="card card-small mt-4 p-4 mb-4"> 
              
                <table class="table table-striped">

                    <thead>
                      <tr>
                        <th scope="col">Nom de l'entreprise</th>
                        <th scope="col">Adresse mail</th>
                        <th scope="col">N° de téléphone</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($company_contact as $contact)
                        <tr>
                          <td> {{ $contact->company_name }}</td>
                          <td> {{ $contact->company_email }} </td>
                          <td> {{ $contact->phone }} </td>
                          <td> {{ $contact->address }} </td>
                          <td> 
                            <a href="#" class="btn btn-primary">Consulter</a> 
                            <a href="{{ route('delete_contact',$contact->id) }}" class="btn btn-danger">Supprimer</a> 
                          </td>
                        </tr>
                      @endforeach
    
                    </tbody>
                </table>
    
    
            </div>
        </div>
    </div>




    
    
@endsection