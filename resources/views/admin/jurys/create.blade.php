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
           <h1 class="mb-0">Créer Jury</h1>
           <hr />
          <form action="{{route('jurys.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="NumJury" class="form-label">NumJury</label>
                    <input type="text" class="form-control" id="NumJury" name="NumJury" required>
                </div>

                <div class="col mb-3">
                    <label for="President" class="form-label">Président</label>
                    <input type="text" class="form-control" id="President" name="President" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="Examinateur" class="form-label">Examinateur</label>
                    <input type="text" class="form-control" id="Examinateur" name="Examinateur" required>
                </div>


                <div class="col mb-3">
                    <label for="Rapporteur" class="form-label">Rapporteur</label>
                    <input type="text" class="form-control" id="Rapporteur" name="Rapporteur" required>
                </div>
            </div>

           
            <button type="submit" class="btn btn-primary">Créer le Jury</button>
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