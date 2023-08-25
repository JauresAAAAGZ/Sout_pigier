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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="mb-0">Info Memoires</h1>
                    <hr/>
                    <ul>
                        <li>Theme : '{{$memoire->Theme}}'</li>
                        <li>Nombre_Pages : '{{$memoire->Nombre_Pages}}'</li>
                        
                    </ul>
                </div>
            <!-- End of Main Content -->

                @include('partial.footer')
            </div>
        </div>
        

@endsection

