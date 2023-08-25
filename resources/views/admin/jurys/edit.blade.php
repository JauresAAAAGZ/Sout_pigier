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
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">President</label>
                            <input type="text" name="President" class="form-control" placeholder="President" value="{{ $jurys->President }}" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Examinateur</label>
                            <input type="text" name="Examinateur" class="form-control" placeholder="Examinateur" value="{{ $jurys->Examinateur }}">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Rapporteur</label>
                            <input type="text" name="Rapporteur" class="form-control" placeholder="Rapporteur" value="{{ $jurys->Rapporteur }}">
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
