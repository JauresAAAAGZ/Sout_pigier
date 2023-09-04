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
                <h1 class="mb-0">Editer Soutenance</h1>
                <hr />
                <form action="{{ route('soutenances.update', $soutenance) }}" method="post" id="editsoutenance">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col mb-3">
                            <label class="form-label">Nom_Soutenance</label>
                            <input type="text" name="Nom_Soutenance" class="form-control" placeholder="Nom_Soutenance" value="{{ $soutenance->Nom_Soutenance }}">
                            @error('Nom_Soutenance')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Date_Soutenance</label>
                            <input type="date" name="Date_Soutenance" class="form-control" placeholder="Date_Soutenance" value="{{ $soutenance->Date_Soutenance }}">
                            @error('Date_Soutenance')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>
                       
                    </div>
                    <div class="row">

                        <div class="col mb-3">
                            <label class="form-label">Heure_Soutenance</label>
                            <input type="time" name="Heure_Soutenance" class="form-control" placeholder="Heure_Soutenance" value="{{ $soutenance->Heure_Soutenance }}" >
                            @error('Heure_Soutenance')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Salle_Soutenance</label>
                            <input type="text" name="Salle_Soutenance" class="form-control" placeholder="Salle_Soutenance" value="{{ $soutenance->Salle_Soutenance }}">
                            @error('Salle_Soutenance')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="d-grid">
                            <button id="soutenanceedit" class="btn btn-warning" type="submit">Modifier</button>
                        </div>
                    </div>
                </form>
            <!-- End of Main Content -->

           @include('partial.footer')
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var formulaire = document.getElementById('editsoutenance');
                var boutonAjouter = document.getElementById('soutenanceedit');
            
                formulaire.addEventListener('submit', function (e) {
                    e.preventDefault(); // Empêche la soumission normale du formulaire
            
                    // Désactivez le bouton
                    boutonAjouter.disabled = true;
            
                    // Soumettez le formulaire manuellement
                    this.submit();
                });
            });
            
            
        </script>
    
@endsection
