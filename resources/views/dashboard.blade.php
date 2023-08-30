
@extends('layout.app')

@section('content')

    @include('partial.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
    @include('partial.header')

        <!-- Begin Page Content -->
            <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tableau de Bord</h1>
                    </div>

                   

            </div>
            <!-- End of Main Content -->

    @include('partial.footer')
    </div>
    </div>

@endsection



