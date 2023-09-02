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
                <h1 class="mb-0">Editer Etudiant</h1>
                <hr />
                <form action="{{ route('etudiants.update', $etudiant) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Matricule</label>
                            <input type="text" name="Matricule" class="form-control" placeholder="Matricule" value="{{ $etudiant->Matricule }}">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" name="Nom" class="form-control" placeholder="Nom" value="{{ $etudiant->Nom }}" >
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Prenom</label>
                            <input type="text" name="Prenom" class="form-control" placeholder="Prenom" value="{{ $etudiant->Prenom }}">
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col mb-3">
                            <label class="form-label">Niveau d'étude</label>
                            <input type="text" name="Niveau_Etude" class="form-control" placeholder="Niveau d'étude" value="{{ $etudiant->Niveau_Etude }}">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Date de naissance</label>
                            <input type="date" name="Date_Naissance" class="form-control" placeholder="Date_Naissance" value="{{ $etudiant->Date_Naissance }}">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Lieu de naissance</label>
                            <input type="text" name="Lieu_Naissance" class="form-control" placeholder="Lieu_Naissance" value="{{ $etudiant->Lieu_Naissance }}">
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
                            <button class="btn btn-warning" type="submit">Modifier</button>
                        </div>
                    </div>
                </form>
            <!-- End of Main Content -->

           @include('partial.footer')
            </div>
        </div>
    
    
@endsection
