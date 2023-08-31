@extends('layout.app')

@section('content')

        <!-- Sidebar -->
        @include('partial.sidebar')
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
                    
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 col-12">
                            <h6 class="m-0 font-weight-bold text-primary col-6">Etudiants</h6>
                            <a href="{{ route('etudiants.create') }}" class="btn btn-info">Ajouter</a>
                        </div>
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
                                                    {{ $etudiant->filiere->Intitule_Filiere }}
                                                </td>
                                                <td>
                                                    {{ $etudiant->memoire->Theme }}
                                                </td>
                                                <td>
                                                    {{$etudiant->memoire->Date_Depot}}
                                                </td>
                                                <td>
                                                    {{$etudiant->professeur->Nom_Professeur}} {{$etudiant->professeur->Prenom_Professeur}}
                                                </td>
                                                <td>
                                                    {{$etudiant->professeur->Grade}}
                                                </td>
                                                <td>{{$etudiant->jury->NumJury}}</td>
                                                <td>{{$etudiant->jury->President}}</td>
                                                <td>"""</td>
                                                <td>{{$etudiant->jury->Examinateur}}</td>
                                                <td>"""</td>
                                                <td>{{$etudiant->jury->Rapporteur}}</td>
                                                <td>"""</td>
                                                <td>{{$etudiant->soutenance->Date_Soutenance}}</td>
                                                <td>{{$etudiant->soutenance->Heure_Soutenance}}</td>
                                                <td>{{$etudiant->soutenance->Salle_Soutenance}}</td>
                                               
                                                <td>
                                                    <a href="{{ route('etudiants.show', $etudiant) }}" class="btn btn-info">Voir</a>
                                                    <a href="{{ route('etudiants.edit', $etudiant) }}" class="btn btn-primary">Modifier</a>
                                                    <a href="{{ route('etudiants.infopv', $etudiant) }}" class="btn btn-warning">PV</a>
                                                    <form action="{{ url('/etudiants/'.$etudiant->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
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
        
   

@endsection