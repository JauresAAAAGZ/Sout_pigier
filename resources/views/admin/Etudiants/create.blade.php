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
           <h1 class="mb-0">Créer Etudiant</h1>
           <hr />
          <form action="{{route('etudiants.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="Matricule" class="form-label">Matricule</label>
                    <input type="text" class="form-control" id="Matricule" name="Matricule" required>
                </div>

                <div class="col mb-3">
                    <label for="Nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="Nom" name="Nom" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="Prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="Prenom" name="Prenom" required>
                </div>


                <div class="col mb-3">
                    <label for="Niveau_Etude" class="form-label">Niveau d'étude</label>
                    <input type="text" class="form-control" id="Niveau_Etude" name="Niveau_Etude" required>
                </div>
                <div class="col mb-3">
                    <label for="Date_Naissance" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="Date_Naissance" name="Date_Naissance" required>
                </div>
            </div>

           
            <button type="submit" class="btn btn-primary">Créer l'étudiant</button>
        </form>
        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection