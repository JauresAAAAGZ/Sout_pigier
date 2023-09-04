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
          <form action="{{route('jurys.store')}}" method="post" id="addjury">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="NumJury" class="form-label">NumJury</label>
                    <input type="text" class="form-control" id="NumJury" name="NumJury" value="{{old('NumJury')}}" required>
                    @error('NumJury')
                    <p class="text-red-500">{{ $message }}</p>
                   @enderror
                </div>

                <div class="col mb-3">
                    <label for="President" class="form-label">President</label>
                    <select name="President" id="President" class="form-control">
                        @foreach ($professeurs as $professeur)
                        <option value="{{$professeur->id}}">{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="Examinateur" class="form-label">Examinateur</label>
                    <select name="Examinateur" id="Examinateur" class="form-control">
                        @foreach ($professeurs as $professeur)
                        <option value="{{$professeur->id}}">{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col mb-3">
                    <label for="Rapporteur" class="form-label">Rapporteur</label>
                    <select name="Rapporteur" id="Rapporteur" class="form-control">
                        @foreach ($professeurs as $professeur)
                        <option value="{{$professeur->id}}">{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

           
            <button id="juryadd" type="submit" class="btn btn-primary">Créer le Jury</button>
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
        var formulaire = document.getElementById('addjury');
        var boutonAjouter = document.getElementById('juryadd');
    
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