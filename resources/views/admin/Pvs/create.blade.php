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
           <h1 class="mb-0">Créer PV</h1>
           <hr />
          <form action="{{route('pvs.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="Num_PV" class="form-label">Num_PV</label>
                    <input type="text" class="form-control" id="Num_PV" name="Num_PV" required>
                </div>

               
            </div>
            
           
            <button type="submit" class="btn btn-primary">Créer le PV</button>
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