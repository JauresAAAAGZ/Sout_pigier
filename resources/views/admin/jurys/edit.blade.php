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
                <h1 class="mb-0">Editer Jury</h1>
                <hr />
                <form action="{{ route('jurys.update', $jurys) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">NumJury</label>
                            <input type="text" name="NumJury" class="form-control" placeholder="NumJury" value="{{ $jurys->NumJury }}">
                            @error('NumJury')
                            <p class="text-red-500">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="President" class="form-label">President</label>
                            <select name="President" id="President" class="form-control">
                                @foreach ($professeurs as $professeur)
                                <option value="{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}">{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="Examinateur" class="form-label">Examinateur</label>
                            <select name="Examinateur" id="Examinateur" class="form-control">
                                @foreach ($professeurs as $professeur)
                                <option value="{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}">{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="Rapporteur" class="form-label">Rapporteur</label>
                            <select name="Rapporteur" id="Rapporteur" class="form-control">
                                @foreach ($professeurs as $professeur)
                                <option value="{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}">{{$professeur->Nom_Professeur}} {{$professeur->Prenom_Professeur}}</option>
                                @endforeach
                            </select>
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
