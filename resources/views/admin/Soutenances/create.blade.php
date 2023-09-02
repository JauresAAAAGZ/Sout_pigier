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
           <h1 class="mb-0">Créer Soutenance</h1>
           <hr />
          <form action="{{route('soutenances.store')}}" method="post">
            @csrf
            <div class="row">

                <div class="col mb-3">
                    <label for="Nom_Soutenance" class="form-label">Nom_Soutenance</label>
                    <input type="text" class="form-control" id="Nom_Soutenance" name="Nom_Soutenance" required>
                    @error('Nom_Soutenance')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                </div>
                
                <div class="col mb-3">
                    <label for="Date_Soutenance" class="form-label">Date_Soutenance</label>
                    <input type="date" class="form-control" id="Date_Soutenance" name="Date_Soutenance" required>
                    @error('Date_Soutenance')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                </div>

               
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="Salle_Soutenance" class="form-label">Salle_Soutenance</label>
                    <input type="text" class="form-control" id="Salle_Soutenance" name="Salle_Soutenance" required>
                    @error('Salle_Soutenance')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                </div>
                <div class="col mb-3">
                    <label for="Heure_Soutenance" class="form-label">Heure_Soutenance</label>
                    <input type="time" class="form-control" id="Heure_Soutenance" name="Heure_Soutenance" required>
                    @error('Heure_Soutenance')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                </div>
            </div>

           
            <button type="submit" class="btn btn-primary">Créer la soutenance</button>
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