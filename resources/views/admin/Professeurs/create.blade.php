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
           <h1 class="mb-0">Créer Professeur</h1>
           <hr />
          <form action="{{route('professeurs.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="Nom_Professeur" class="form-label">Nom_Professeur</label>
                    <input type="text" class="form-control" id="Nom_Professeur" name="Nom_Professeur" required>
                </div>

                <div class="col mb-3">
                    <label for="Prenom_Professeur" class="form-label">Prenom_Professeur</label>
                    <input type="text" class="form-control" id="Prenom_Professeur" name="Prenom_Professeur" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="Grade" class="form-label">Grade</label>
                    <input type="text" class="form-control" id="Grade" name="Grade" required>
                </div>

            </div>

           
            <button type="submit" class="btn btn-primary">Créer le professeur</button>
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