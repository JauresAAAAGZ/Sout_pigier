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
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Prenom</label>
                            <input type="text" name="Prenom" class="form-control" placeholder="Prenom" value="{{ $etudiant->Prenom }}">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Niveau d'étude</label>
                            <input type="text" name="Niveau_Etude" class="form-control" placeholder="Niveau d'étude" value="{{ $etudiant->Niveau_Etude }}">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Date de naissance</label>
                            <input type="text" name="Date_Naissance" class="form-control" placeholder="Date_Naissance" value="{{ $etudiant->Date_Naissance }}">
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
