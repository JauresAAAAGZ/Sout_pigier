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
                    <h1 class="mb-0">Info Jurys</h1>
                    <hr/>
                    <ul>
                        <li>Matricule : {{$etudiant->Matricule}}</li>
                        <li>Nom : {{$etudiant->Nom}}</li>
                        <li>Prenom : {{$etudiant->Prenom}}</li>
                        <li>Niveau d'étude : {{ $etudiant->Niveau_Etude }}</li>
                        <li>Date de naissance : {{ $etudiant->Date_Naissance }}</li>
                        <li>Lieu de naissance : {{ $etudiant->Lieu_Naissance }}</li>
                        <li>Filiere : {{ $etudiant->filiere->Intitule_Filiere }}</li>
                        <li>Theme : {{ $etudiant->memoire->Theme}}</li>
                        <li>Date de depot: {{$etudiant->memoire->Date_Depot}}</li>
                        <li>Directeur: {{$etudiant->professeur->Nom_Professeur}} {{$etudiant->professeur->Prenom_Professeur}}</li>
                        <li>Grade Directeur: {{$etudiant->professeur->Grade}}</li>
                        <li>Jury: {{$etudiant->jury->NumJury}}</li>
                        <li>Président: {{$etudiant->jury->President}}</li>
                        <li>Grade Président: """</li>
                        <li>Examinateur : {{$etudiant->jury->Examinateur}}</li>
                        <li>"""</li>
                        <li>Rapporteur: {{$etudiant->jury->Rapporteur}}</li>
                        <li>"""</li>
                    </ul>
                </div>
            <!-- End of Main Content -->

                @include('partial.footer')
            </div>
        </div>
        

@endsection

