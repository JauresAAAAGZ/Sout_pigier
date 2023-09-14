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
                <h1 class="mb-0">Editer Etudiant</h1>
                <hr />
                <form action="{{ route('etudiants.update', $etudiant) }}" method="post" id="editetu">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Matricule</label>
                            <input type="text" name="Matricule" class="form-control" placeholder="Matricule" value="{{ $etudiant->Matricule }}">
                            @error('Matricule')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" name="Nom" class="form-control" placeholder="Nom" value="{{ $etudiant->Nom }}" >
                            @error('Nom')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Prenom</label>
                            <input type="text" name="Prenom" class="form-control" placeholder="Prenom" value="{{ $etudiant->Prenom }}">
                            @error('Prenom')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col mb-3">
                            <label class="form-label">Niveau d'étude</label>
                            <input type="text" name="Niveau_Etude" class="form-control" placeholder="Niveau d'étude" value="{{ $etudiant->Niveau_Etude }}">
                            @error('Niveau_Etude')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Date de naissance</label>
                            <input type="date" name="Date_Naissance" class="form-control" placeholder="Date_Naissance" value="{{ $etudiant->Date_Naissance }}">
                            @error('Date_Naissance')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Lieu de naissance</label>
                            <input type="text" name="Lieu_Naissance" class="form-control" placeholder="Lieu_Naissance" value="{{ $etudiant->Lieu_Naissance }}">
                            @error('Lieu_Naissance')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>
                       
                    </div>
                    <div class="mb-3">
                        <label for="filiere" class="form-label">Filiere</label>
                        <select name="filiere_id" id="filiere" class="form-control">
                            
                            @foreach ($filieres as $filiere)
                            <option value="{{$filiere->id}}"
                            @if ($filiere->id == $etudiant->filiere_id)
                            selected
                            @endif
                            
                            >{{$filiere->Intitule_Filiere}}</option>
                            @endforeach
                            
                           
                        </select>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="memoire" class="form-label">Memoire</label>
                            <select name="memoire_id" id="memoire" class="form-control">
                                @foreach ($memoires as $memoire)
                            <option value="{{$memoire->id}}"
                                @if ($memoire->id == $etudiant->memoire_id)
                                selected
                                @endif>{{$memoire->Theme}}
                            </option>
                                @endforeach
                            </select>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col mb-3">
        
                            <label for="professeur" class="form-label">Directeur</label>
                            <select name="professeur_id" id="professeur" class="form-control">
                                @foreach ($professeurs as $professeur)
                                <option value="{{$professeur->id}}" >{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}</option>
                                @endforeach
                            </select>
        
                        </div>
                        <div class="col mb-3">
        
                            <label for="jury" class="form-label">Jury</label>
                            <select name="jury_id" id="jury" class="form-control">
                                @foreach ($jurys as $jury)
                                <option value="{{$jury->id}}" >{{$jury->NumJury}}</option>
                                @endforeach
                            </select>
        
                        </div>
                        <div class="col mb-3">
        
                            <label for="soutenance" class="form-label">Soutenance</label>
                            <select name="soutenance_id" id="soutenance" class="form-control">
                                @foreach ($soutenances as $soutenance)
                                <option value="{{$soutenance->id}}" >{{$soutenance->Nom_Soutenance}}</option>
                                @endforeach
                            </select>
        
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="d-grid">
                            <button id="etuedit" class="btn btn-warning" type="submit">Modifier</button>
                        </div>
                    </div>
                   
                </form>
            <!-- End of Main Content -->

           @include('partial.footer')
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var formulaire = document.getElementById('editetu');
                var boutonAjouter = document.getElementById('etuedit');
            
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
