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
                <h1 class="mb-0">Editer Memoire</h1>
                <hr />
                <form action="{{ route('memoires.update', $memoire) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Theme</label>
                            <input type="text" name="Theme" class="form-control" placeholder="Theme" value="{{ $memoire->Theme }}">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Nombre_Pages</label>
                            <input type="text" name="Nombre_Pages" class="form-control" placeholder="Nombre_Pages" value="{{ $memoire->Nombre_Pages }}" >
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Date_Depot</label>
                            <input type="date" name="Date_Depot" class="form-control" placeholder="Date_Depot" value="{{ $memoire->Date_Depot }}" >
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
