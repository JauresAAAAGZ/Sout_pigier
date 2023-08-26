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
           <h1 class="mb-0">Créer Memoire</h1>
           <hr />
          <form action="{{route('memoires.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="Theme" class="form-label">Theme</label>
                    <input type="text" class="form-control" id="Theme" name="Theme" required>
                </div>

                <div class="col mb-3">
                    <label for="Nombre_Pages" class="form-label">Nombre_Pages</label>
                    <input type="text" class="form-control" id="Nombre_Pages" name="Nombre_Pages">
                </div>
                <div class="col mb-3">
                  <label for="Date_Depot" class="form-label">Date_Depot</label>
                  <input type="date" class="form-control" id="Date_Depot" name="Date_Depot" required>
              </div>
            </div>
                       
            <button type="submit" class="btn btn-primary">Créer le memoire</button>
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