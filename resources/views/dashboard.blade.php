
@extends('layout.app')

@section('content')

     @if (auth()->user()->isAdmin())
                @include('partial.sidebar')
            @elseif (auth()->user()->isDE())
                @include('partial.sidebar_DE')
            @elseif (auth()->user()->isCoordonateur())
                @include('partial.sidebar_Coordonateur')
            @elseif (auth()->user()->isADE())
                @include('partial.sidebar_Assistant_Directeur_des_Etudes')
            @endif
   
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

   
    </div>
    @include('partial.footer')
    </div>

@endsection



