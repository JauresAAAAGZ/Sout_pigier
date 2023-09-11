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
                    <h1 class="h3 mb-2 text-gray-800">Les Memoires</h1>
                    
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 col-12">
                            <h6 class="m-0 font-weight-bold text-primary col-6">Memoires</h6>
                            <a href="{{ route('memoires.create') }}" class="btn btn-info">Ajouter</a>
                        </div>
                        @if(session('message'))
                        <div id="success-message" class=" alert alert-success">
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
                                            <th>Theme</th>
                                            <th>Nombres_Pages</th>
                                            <th>Date_Depot</th>
                                            <th>Opérations</th>
                
                                        </tr>
                                    </thead>
                                    <!--<tfoot>
                                        <tr>
                                            <th>Jury</th>
                                            <th>Salle</th>
                                            <th>Date Et Heure</th>
                                            <th>Prenom_Professeur et Prénoms</th>
                                            <th>Thème</th>
                                            <th>Directeur</th>
                                            <th>Président</th>
                                            <th>Examinateur</th>
                                            <th>Rapporteur</th>
                                        </tr>
                                    </tfoot>-->
                                    <tbody>
                                        @foreach($memoires as $memoire)
                                            <tr>
                                                <td>
                                                {{ $memoire->Theme }}
                                                </td>
                                                <td>
                                                    {{ $memoire->Nombre_Pages }}
                                                </td>
                                                <td>
                                                    {{ $memoire->Date_Depot }}
                                                </td>
                                               
                                                <td>
                                                    <a href="{{ route('memoires.show', $memoire) }}" class="btn btn-info">Voir</a>
                                                    <a href="{{ route('memoires.edit', $memoire) }}" class="btn btn-primary">Modifier</a>
                                                    <form action="{{ url('/memoires/'.$memoire->id) }}" method="POST" style="display: inline;">
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