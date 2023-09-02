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
           <h1 class="mb-0">Créer Filiere</h1>
           <hr />
          <form action="{{route('filieres.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="Intitule_Filiere" class="form-label">Intitule_Filiere</label>
                    <input type="text" class="form-control" id="Intitule_Filiere" name="Intitule_Filiere" required>
                    @error('Intitule_Filiere')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                  </div>

                <div class="col mb-3">
                    <label for="Niveau_Filiere" class="form-label">Niveau_Filiere</label>
                    <input type="text" class="form-control" id="Niveau_Filiere" name="Niveau_Filiere" required>
                    @error('Niveau_Filiere')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                  </div>
            </div>
            
           
            <button type="submit" class="btn btn-primary">Créer la filiere</button>
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