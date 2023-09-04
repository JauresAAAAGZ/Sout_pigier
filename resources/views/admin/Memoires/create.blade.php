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
          <form action="{{route('memoires.store')}}" method="post" id="addmemoire">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="Theme" class="form-label">Theme</label>
                    <input type="text" class="form-control" id="Theme" name="Theme" required>
                    @error('Theme')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                  </div>

                <div class="col mb-3">
                    <label for="Nombre_Pages" class="form-label">Nombre_Pages</label>
                    <input type="text" class="form-control" id="Nombre_Pages" name="Nombre_Pages">
                    @error('Nombre_Pages')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                  </div>
                <div class="col mb-3">
                  <label for="Date_Depot" class="form-label">Date_Depot</label>
                  <input type="date" class="form-control" id="Date_Depot" name="Date_Depot" required>
                  @error('Date_Depot')
                  <p class="text-red-500">{{ $message }}</p>
                 @enderror
                </div>
            </div>
                       
            <button id="memoireadd" type="submit" class="btn btn-primary">Créer le memoire</button>
        </form>
        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var formulaire = document.getElementById('addmemoire');
        var boutonAjouter = document.getElementById('memoireadd');
    
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