@extends('layouts.base')

@section('content')

    <h2>Tous les courriers</h2>

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
                        <th scope="col">Titre</th>
                        <th scope="col">Taille</th>
                        <th scope="col">Date depot</th>
                        <th scope="col">Origine</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                       <tr>
                            <td> Document de mise en forme des dossiers   </td>
                            <td>2.9 Mo</td>
                            <td>23 Juillet 2019</td>
                            <td>Service Courier</td>
                            <td> 
                              <a href="#" class="btn btn-primary">Consulter</a> 
                              <a href="" class="btn btn-danger">Supprimer</a> 
                            </td>
                       </tr>
                       <tr>
                            <td> Document de mise en forme des dossiers   </td>
                            <td>2.9 Mo</td>
                            <td>23 Juillet 2019</td>
                            <td>DSI</td>
                            <td> 
                              <a href="#" class="btn btn-primary">Consulter</a> 
                              <a href="" class="btn btn-danger">Supprimer</a> 
                            </td>
                       </tr>
                       <tr>
                            <td> Document de mise en forme des dossiers   </td>
                            <td>2.9 Mo</td>
                            <td>23 Juillet 2019</td>
                            <td>SG</td>
                            <td> 
                              <a href="#" class="btn btn-primary">Consulter</a> 
                              <a href="" class="btn btn-danger">Supprimer</a> 
                            </td>
                       </tr>
                       <tr>
                            <td> Document de mise en forme des dossiers   </td>
                            <td>2.9 Mo</td>
                            <td>23 Juillet 2019</td>
                            <td>DAF</td>
                            <td> 
                              <a href="#" class="btn btn-primary">Consulter</a> 
                              <a href="" class="btn btn-danger">Supprimer</a> 
                            </td>
                       </tr>
    
                    </tbody>
                </table>
    
    
            </div>
        </div>
    </div>

@endsection