@extends('layout.app')

@section('content')


<style>

    td,th{

       white-space: nowrap;
    }
</style>
        <!-- Sidebar -->
         @if (auth()->user()->isAdmin())
                @include('partial.sidebar')
            @elseif (auth()->user()->isDE())
                @include('partial.sidebar_DE')
            @elseif (auth()->user()->isCoordonateur())
                @include('partial.sidebar_Coordonateur')
            @elseif (auth()->user()->isADE())
                @include('partial.sidebar_Assistant_Directeur_des_Etudes')
            @endif
   
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('partial.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Les Etudiants</h1>
                    <h6 style="color: red;">Assurez vous d'avoir enregistré, les professeurs, les jurys, les memoires, et programmé les soutenances avant de modifier les etudiants</h6>
                    
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Etudiants</h6>
                            <a href="{{ route('charts') }}" class="btn btn-info">Ajouter</a>
                        </div>
                        
                        @if(session('message'))
                        <div id="success-message" class="alert alert-success">
                            {{session('message')}}
                        </div>
                        @endif
                        @if(session('danger'))
                        <div id="success-message" class="alert alert-danger">
                            {{session('danger')}}
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Matricule</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Niveau_Etude</th>
                                            <th>Date_Naissance</th>
                                            <th>Lieu_Naissance</th>
                                            <th>Filiere</th>
                                            <th>Theme</th>
                                            <th>Date de Depot</th>
                                            <th>Directeur</th>
                                            <th>Grade-Directeur</th>
                                            <th>Jury</th>
                                            <th>Président</th>
                                            <th>Grade-Président</th>
                                            <th>Examinateur</th>
                                            <th>Grade-Examinateur</th>
                                            <th>Rapporteur</th>
                                            <th>Grade-Rapporteur</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Salle</th>
                                            <th>Opérations</th>
                                        </tr>
                                    </thead>
                                    <!--<tfoot>
                                        <tr>
                                            <th>Jury</th>
                                            <th>Salle</th>
                                            <th>Date Et Heure</th>
                                            <th>Nom et Prénoms</th>
                                            <th>Thème</th>
                                            <th>Directeur</th>
                                            <th>Président</th>
                                            <th>Examinateur</th>
                                            <th>Rapporteur</th>
                                        </tr>
                                    </tfoot>-->
                                    <tbody>
                                        @foreach($etudiants as $etudiant)
                                            <tr>
                                                <td>
                                                {{ $etudiant->Matricule }}
                                                </td>
                                                
                                                <td>
                                                    {{ $etudiant->Nom }}
                                                </td>
                                                <td>
                                                    {{ $etudiant->Prenom }}
                                                </td>
                                                <td>
                                                    {{ $etudiant->Niveau_Etude }}
                                                </td>
                                                <td>
                                                    {{ $etudiant->Date_Naissance }}
                                                </td>
                                                <td>
                                                    {{ $etudiant->Lieu_Naissance }}
                                                </td>
                                                <td>
                                                    @if ($etudiant->filiere)
                                                    {{ $etudiant->filiere->Intitule_Filiere }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($etudiant->memoire)
                                                    {{ $etudiant->memoire->Theme }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($etudiant->memoire)
                                                    {{$etudiant->memoire->Date_Depot}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($etudiant->professeur)
                                                    {{$etudiant->professeur->Nom_Professeur}} {{$etudiant->professeur->Prenom_Professeur}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($etudiant->professeur)
                                                    {{$etudiant->professeur->Grade}}
                                                    @endif
                                                        
                                                   
                                                </td>
                                                <td>
                                                    @if ($etudiant->jury)
                                                    {{$etudiant->jury->NumJury}}
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($etudiant->jury)
                                                        
                                                   
                                                    @if ($etudiant->jury->president)
                                                    {{$etudiant->jury->president->Nom_Professeur}} {{$etudiant->jury->president->Prenom_Professeur}}
                                                    @endif

                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($etudiant->jury)
                                                        
                                                    
                                                 @if ($etudiant->jury->president)
                                                 {{$etudiant->jury->president->Grade}}
                                                 @endif

                                                 @endif
                                                </td>

                                                <td>
                                                    @if ($etudiant->jury)
                                                        
                                                    
                                                    @if ($etudiant->jury->examinateur)
                                                    {{$etudiant->jury->examinateur->Nom_Professeur}} {{$etudiant->jury->examinateur->Prenom_Professeur}}
                                                        
                                                    @endif

                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($etudiant->jury)
                                                    @if ($etudiant->jury->examinateur)
                                                    {{$etudiant->jury->examinateur->Grade}}
                                                    @endif
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($etudiant->jury)
                                                    @if ($etudiant->jury->rapporteur)
                                                    {{$etudiant->jury->rapporteur->Nom_Professeur}} {{$etudiant->jury->rapporteur->Prenom_Professeur}}
                                                        
                                                    @endif
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($etudiant->jury)
                                                    @if ($etudiant->jury->rapporteur)
                                                    {{$etudiant->jury->rapporteur->Grade}}
                                                        
                                                    @endif
                                                    @endif
                                                </td>

                                                <td>
                                                   
                                                    @if ($etudiant->soutenance)
                                                    {{$etudiant->soutenance->Date_Soutenance}}
                                                        
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($etudiant->soutenance)
                                                        {{$etudiant->soutenance->Heure_Soutenance}}
                                               
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($etudiant->soutenance)
                                                    {{$etudiant->soutenance->Salle_Soutenance}}
                                                    @endif
                                                </td>
                                               
                                                <td>
                                                    <a href="{{ route('etudiants.show', $etudiant) }}" class="btn btn-info">Voir</a>
                                                    <a href="{{ route('etudiants.infopv', $etudiant) }}" class="btn btn-warning">PV</a>
                                                    <a href="{{ route('etudiants.edit', $etudiant) }}" class="btn btn-primary">Modifier</a>
                                                    <form action="{{ url('/etudiants/'.$etudiant->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                    
                                                          <button type="submit" class="btn btn-danger">Supprimer</button>
                                                        <label for="confirmation">Confirmez-suppression:</label>
                                                        <input type="checkbox" name="confirmation" required title="veuillez cocher cette case pour comfimer la suppression">
                                                       
                                                    </form>
                                                   
                                                </td>
                        
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           @include('partial.footer')
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var successMessage = document.getElementById('success-message');
        
                if (successMessage) {
                    // Set the timeout in milliseconds (e.g., 5000ms = 5 seconds)
                    var timeout = 3000;
        
                    // Automatically dismiss the success message after the timeout
                    setTimeout(function () {
                        successMessage.style.display = 'none'; // Hide the message
                    }, timeout);
                }
            });
        </script>


@endsection