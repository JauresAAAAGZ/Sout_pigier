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
                        <li>Matricule : '{{$etudiant->Matricule}}'</li>
                        <li>Nom : '{{$etudiant->Nom}}'</li>
                        <li>Prenom : '{{$etudiant->Prenom}}'</li>
                        <li>Niveau d'étude : '{{ $etudiant->Niveau_Etude }}'</li>
                        <li>Date de naissance : '{{ $etudiant->Date_Naissance }}'</li>
                    </ul>
                </div>
            <!-- End of Main Content -->

                @include('partial.footer')
            </div>
        </div>
        

@endsection

