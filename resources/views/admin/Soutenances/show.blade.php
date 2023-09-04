@extends('layout.app')

@section('content')

    
   

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
                    <h1 class="mb-0">Info Soutenances</h1>
                    <hr/>
                    <ul>
                        <li>Soutenance N°:  '{{ $soutenance->Nom_Soutenance }}'</li>
                        <li>Date_Soutenance : '{{$soutenance->Date_Soutenance}}'</li>
                        <li>Heure_Soutenance : '{{$soutenance->Heure_Soutenance}}'</li>
                        <li>Salle_Soutenance : '{{$soutenance->Salle_Soutenance}}'</li>
                    </ul>
                </div>
            <!-- End of Main Content -->

                @include('partial.footer')
            </div>
        </div>
        

@endsection

