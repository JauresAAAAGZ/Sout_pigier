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
                    <h1 class="mb-0">Info Etudiant</h1>
                    <hr/>
                    <ul>
                        <li>Matricule : {{$etudiant->Matricule}}</li>
                        <li>Nom : {{$etudiant->Nom}}</li>
                        <li>Prenom : {{$etudiant->Prenom}}</li>
                        <li>Niveau d'étude : {{ $etudiant->Niveau_Etude }}</li>
                        <li>Date de naissance : {{ $etudiant->Date_Naissance }}</li>
                        <li>Lieu de naissance : {{ $etudiant->Lieu_Naissance }}</li>

                        <li>Filiere : 
                            @if ($etudiant->filiere)
                                {{ $etudiant->filiere->Intitule_Filiere }}
                            @endif
                        </li>

                        <li>Theme : 
                            @if ($etudiant->memoire)
                            {{ $etudiant->memoire->Theme}}
                            @endif
                        </li>

                        <li>Date de depot: 
                            @if ($etudiant->memoire)
                                {{$etudiant->memoire->Date_Depot}}
                            @endif
                        </li>

                        <li>Directeur: 
                            @if ($etudiant->professeur)
                                {{$etudiant->professeur->Nom_Professeur}} {{$etudiant->professeur->Prenom_Professeur}}
                            @endif
                        </li>

                        <li>Grade Directeur: 
                            @if ($etudiant->professeur)
                                {{$etudiant->professeur->Grade}}
                            @endif
                        </li>

                        <li>Jury: 
                            @if ($etudiant->jury)
                                {{$etudiant->jury->NumJury}}
                            @endif
                        </li>

                        <li>Président: 
                            @if ($etudiant->jury)
                            {{$etudiant->jury->president->Nom_Professeur}} {{$etudiant->jury->president->Prenom_Professeur}}
                            @endif
                        </li>

                        <li>Grade Président: 
                            @if ($etudiant->jury)
                            {{$etudiant->jury->president->Grade}}
                            @endif
                        </li>

                        <li>Examinateur : 
                            @if ($etudiant->jury)
                            {{$etudiant->jury->examinateur->Nom_Professeur}} {{$etudiant->jury->examinateur->Prenom_Professeur}}
                            @endif
                        </li>
                        
                        <li>Grade Examinateur :
                            @if ($etudiant->jury)
                            {{$etudiant->jury->examinateur->Grade}}
                            @endif
                        </li>

                        <li>Rapporteur: 
                            @if ($etudiant->jury)
                            {{$etudiant->jury->rapporteur->Nom_Professeur}} {{$etudiant->jury->rapporteur->Prenom_Professeur}}
                            @endif
                        </li>

                        <li>Grade Rapporteur : 
                            @if ($etudiant->jury)
                                {{$etudiant->jury->rapporteur->Grade}}
                            @endif
                        </li>

                        <li>Date Soutenance : 
                            @if ($etudiant->soutenance)
                                {{$etudiant->soutenance->Date_Soutenance}}
                            @endif
                        </li>

                        <li>Heure Soutenance : 
                            @if ($etudiant->soutenance)
                                {{$etudiant->soutenance->Heure_Soutenance}}
                            @endif 
                        </li>

                        <li>Salle Soutenance : 
                            @if ($etudiant->soutenance)
                                {{$etudiant->soutenance->Salle_Soutenance}}
                            @endif
                        </li>
                    </ul>
                </div>
            <!-- End of Main Content -->

                @include('partial.footer')
            </div>
        </div>
        

@endsection

