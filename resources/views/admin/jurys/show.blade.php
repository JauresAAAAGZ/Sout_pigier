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
                        <li>N° Jury: '{{$jurys->NumJury}}'</li>
                        <li>President: '{{$jurys->president->Nom_Professeur}} {{$jurys->president->Prenom_Professeur}}'</li>
                        <li>Examinateur: '{{$jurys->examinateur->Nom_Professeur}} {{$jurys->examinateur->Prenom_Professeur}}'</li>
                        <li>Rapporteur: '{{ $jurys->rapporteur->Nom_Professeur }} {{ $jurys->rapporteur->Prenom_Professeur }}'</li>
                    </ul>
                </div>
            <!-- End of Main Content -->

                @include('partial.footer')
            </div>
        </div>
        

@endsection

