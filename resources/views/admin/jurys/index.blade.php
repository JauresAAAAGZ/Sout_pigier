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
                    <h1 class="h3 mb-2 text-gray-800">Les Jurys</h1>
                    <h6 style="color: red;">Assurez vous d'avoir enregistré les directeurs(professeurs) avant d'enregistrer les Jurys</h6>
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 col-12">
                            <h6 class="m-0 font-weight-bold text-primary col-6">Jurys</h6>
                            <a href="{{ route('jurys.create') }}" class="btn btn-info">Ajouter</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Jury</th>
                                            <th>Président</th>
                                            <th>Examinateur</th>
                                            <th>Rapporteur</th>
                                            <th>Grade</th>
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
                                        @foreach($jurys as $jury)
                                            <tr>
                                                <td>
                                                {{ $jury->NumJury }}
                                                </td>
                                                <td>
                                                    {{ $jury->president->Nom_Professeur }} {{ $jury->president->Prenom_Professeur }}
                                                </td>
                                                <td>
                                                    {{ $jury->examinateur->Nom_Professeur }} {{ $jury->examinateur->Prenom_Professeur }}
                                                </td>
                                                <td>
                                                    {{ $jury->rapporteur->Nom_Professeur }} {{ $jury->rapporteur->Prenom_Professeur }}
                                                </td>
                                                <td>
                                                    {{ $jury->rapporteur->Grade }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('jurys.show', $jury) }}" class="btn btn-info">Voir</a>
                                                    <a href="{{ route('jurys.edit', $jury) }}" class="btn btn-primary">Modifier</a>
                                                    <a href="{{ route('jurys.destroy', $jury) }}" class="btn btn-danger">Supprimer</a>
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