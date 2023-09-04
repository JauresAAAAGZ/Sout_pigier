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
           <h1 class="mb-0">Créer Etudiant</h1>
           <hr />
          <form action="{{route('etudiants.store')}}" method="post" id="addetu">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="Matricule" class="form-label">Matricule</label>
                    <input type="text" class="form-control" id="Matricule" name="Matricule" required>
                    @error('Matricule')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="Nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="Nom" name="Nom" required>
                    @error('Nom')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                </div>
                <div class="col mb-3">
                    <label for="Prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="Prenom" name="Prenom" required>
                    @error('Prenom')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                </div>
            </div>
            <div class="row">
                
                <div class="col mb-3">
                    <label for="Niveau_Etude" class="form-label">Niveau d'étude</label>
                    <input type="text" class="form-control" id="Niveau_Etude" name="Niveau_Etude" required>
                    @error('Niveau_Etude')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                </div>
                <div class="col mb-3">
                    <label for="Date_Naissance" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="Date_Naissance" name="Date_Naissance" required>
                    @error('Date_Naissance')
                     <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="Lieu_Naissance" class="form-label">Lieu de naissance</label>
                    <input type="text" class="form-control" id="Lieu_Naissance" name="Lieu_Naissance" required>
                    @error('Lieu_Naissance')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="filiere" class="form-label">Filiere</label>
                    <select name="filiere_id" id="filiere" class="form-control">
                        <option disabled selected value> Choisir une filière</option>
                        @foreach ($filieres as $filiere)
                        <option value="{{$filiere->id}}" >{{$filiere->Intitule_Filiere}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="memoire" class="form-label">Memoire</label>
                    <select name="memoire_id" id="memoire" class="form-control">
                        <option disabled selected value> Choisir un Memoire</option>
                        @foreach ($memoires as $memoire)
                        <option value="{{$memoire->id}}" >{{$memoire->Theme}}</option>
                        @endforeach
                    </select>
                </div>
               
                
            </div>
            <div class="row">
                <div class="col mb-3">

                    <label for="professeur" class="form-label">Directeur</label>
                    <select name="professeur_id" id="professeur" class="form-control">
                        <option disabled selected value> Choisir une Directeur</option>
                        @foreach ($professeurs as $professeur)
                        <option value="{{$professeur->id}}" >{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col mb-3">

                    <label for="jury" class="form-label">Jury</label>
                    <select name="jury_id" id="jury" class="form-control">
                        <option disabled selected value> Choisir un Jury</option>
                        @foreach ($jurys as $jury)
                        <option value="{{$jury->id}}" >{{$jury->NumJury}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col mb-3">

                    <label for="soutenance" class="form-label">Soutenance</label>
                    <select name="soutenance_id" id="soutenance" class="form-control">
                        <option disabled selected value> Choisir l'ordre de Soutenance</option>
                        @foreach ($soutenances as $soutenance)
                        <option value="{{$soutenance->id}}" >{{$soutenance->Nom_Soutenance}}</option>
                        @endforeach
                    </select>

                </div>
               
            </div>

           
            <button id="etuadd" type="submit" class="btn btn-primary">Créer l'étudiant</button>
        </form>
        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var formulaire = document.getElementById('addetu');
        var boutonAjouter = document.getElementById('etuadd');
    
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