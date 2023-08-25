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
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Jurys</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Jury</th>
                                            <th>Président</th>
                                            <th>Examinateur</th>
                                            <th>Rapporteur</th>
                                            <th>OP</th>
                
                                        </tr>
                                    </thead>
                                    <!--<tfoot>
                                        <tr>
                                            <th>Jury</th>
                                            <th>Salle</th>
                                            <th>Date Et Heure</th>
                                            <th>Nom et Prénoms</th>
                                            <th>Thème</th>
                                            <th>Directeur</th>
                                            <th>Président</th>
                                            <th>Examinateur</th>
                                            <th>Rapporteur</th>
                                        </tr>
                                    </tfoot>-->
                                    <tbody>
                                        @foreach($jurys as $jury)
                                        <tr>
                                            <td>
                                               {{ $jury->NumJury }}
                                            </td>
                                            <td>
                                                {{ $jury->President }}
                                            </td>
                                            <td>
                                                {{ $jury->Examinateur }}
                                            </td>
                                            <td>
                                                {{ $jury->Rapporteur }}
                                            </td>
                                            <td>
                                                <a href="{{route('jurys.show', $jury)}}" type="button" class="btn btn-secondary">Details</a>
                                                <a href="{{route('jurys.edit', $jury)}}" type="button" class="btn btn-warning">Editer</a>
                                            </td>
                    
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           @include('partial.footer')
        </div>
        
   

@endsection