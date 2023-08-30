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
                <h1 class="mb-0">Editer Soutenance</h1>
                <hr />
                <form action="{{ route('soutenances.update', $soutenance) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Date_Soutenance</label>
                            <input type="date" name="Date_Soutenance" class="form-control" placeholder="Date_Soutenance" value="{{ $soutenance->Date_Soutenance }}">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Heure_Soutenance</label>
                            <input type="time" name="Heure_Soutenance" class="form-control" placeholder="Heure_Soutenance" value="{{ $soutenance->Heure_Soutenance }}" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Salle_Soutenance</label>
                            <input type="text" name="Salle_Soutenance" class="form-control" placeholder="Salle_Soutenance" value="{{ $soutenance->Salle_Soutenance }}">
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
