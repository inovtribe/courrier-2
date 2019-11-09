@extends('layouts.base')

@section('content')

    <h1>Contact Us</h1>

    <div class="row">
        <div class="col">
            <div class="row">
              <div class="col" style="padding-top: 20px;">
                <a href="{{ route('add_mail') }}" class="btn btn-md btn-primary">Nouveau courier</a> 
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
                      @foreach ($all_contact as $contact)
                        <tr>
                          <td> {{ $contact->name }} </td>
                          <td> {{ $contact->email }} </td>
                          <td> {{ $contact->phone }} </td>
                          <td> {{ $contact->address }} </td>
                          <td> 
                            <a href="#" class="btn btn-primary">Consulter</a> 
                            <a href="" class="btn btn-danger">Supprimer</a> 
                          </td>
                        </tr>
                      @endforeach
    
                    </tbody>
                </table>
    
    
            </div>
        </div>
    </div>
@endsection