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
                <h1 class="mb-0">Editer Professeur</h1>
                <hr />
                <form action="{{ route('professeurs.update', $professeur) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Nom_Professeur</label>
                            <input type="text" name="Nom_Professeur" class="form-control" placeholder="Nom_Professeur" value="{{ $professeur->Nom_Professeur }}">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Prenom_Professeur</label>
                            <input type="text" name="Prenom_Professeur" class="form-control" placeholder="Prenom_Professeur" value="{{ $professeur->Prenom_Professeur }}" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Grade</label>
                            <input type="text" name="Grade" class="form-control" placeholder="Grade" value="{{ $professeur->Grade }}">
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
