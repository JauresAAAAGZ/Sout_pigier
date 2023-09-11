@extends('layout.app')

@section('content')

<style>

        body {
            width: 34cm; 
            height: 15cm;  
                }
        #lui {
            margin-left: 16px;
            margin-right: 55px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 5px;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }
        .no-border th, .no-border td {
            border: none;
        }

        td,th{

white-space: nowrap;
}
    </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

        <!-- Sidebar -->
         @if (auth()->user()->isAdmin())
                @include('partial.sidebar')
            @elseif (auth()->user()->isDE())
                @include('partial.sidebar_DE')
            @elseif (auth()->user()->isCoordonateur())
                @include('partial.sidebar_Coordonateur')
            @elseif (auth()->user()->isADE())
                @include('partial.sidebar_Assistant_Directeur_des_Etudes')
            @endif
   
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
                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Le Planning des Soutenances</h1>
                        <div id="dataTable_filter">
                            <label>Filtrer:<input type="search" id="search-bar" class="form-control form-control-sm" placeholder="Par filière par exemple" aria-controls="dataTable">
                        </label>
                    </div>
                        <button id="convertButton" class="btn btn-primary">Generer Planning</button>
                    </div>
                    
                    <!-- DataTales -->
                    <div class="card shadow mb-4" >
                        <div id="tableToConvert">
                        <div class="card-header py-3 col-12">

                            <div id="lui">
                            <h6 class="m-0 font-weight-bold text-primary col-6">Planning</h6>
                           
                        </div>
                        
                       
                        <div class="">
                            
                            <div class="table-responsive" >
                                
                                <br><table class="table table-bordered" id="" style="font-size: 15px;">
                                    <thead>
                                        <tr>
                                            <th>Jury</th>
                                            <th >Date</th>
                                            <th>Heure</th>
                                            <th>Salle</th>
                                            <th>Nom Prenom</th>
                                            <th>Thème</th>
                                            <th>Directeur</th>
                                            <th>Président</th>
                                            <th>Examinateur</th>
                                            <th>Rapporteur</th>
                                            <th>Filiere</th>
                                          
                                        </tr>
                                    </thead>
                                    <!--<tfoot>
                                        <tr>
                                            <th>Jury</th>
                                            <th>Salle</th>
                                            <th>Date Et Heure</th>
                                            <th>Heure_Soutenance et Prénoms</th>
                                            <th>Thème</th>
                                            <th>Directeur</th>
                                            <th>Président</th>
                                            <th>Examinateur</th>
                                            <th>Rapporteur</th>
                                        </tr>
                                    </tfoot>-->
                                    
                                    <tbody>
                                        @foreach($soutenances as $soutenance)
                                            <tr class="data-row">
                                                <td>
                                                    @if ($soutenance->etudiants->first())
                                                        
                                                   
                                                        @if ($soutenance->etudiants->first()->jury)
                                                            {{$soutenance->etudiants->first()->jury->NumJury}}
                                                        @endif
                                                    
                                                    @endif
                                                </td>
                                                <td>
                                                {{ $soutenance->Date_Soutenance }}
                                                </td>
                                                <td>
                                                    {{ $soutenance->Heure_Soutenance }}
                                                </td>
                                                <td>
                                                    {{ $soutenance->Salle_Soutenance }}
                                                </td>
                                                <td>
                                                    @foreach ($soutenance->etudiants as $etudiant )
                                                    {{$etudiant->Nom}} {{$etudiant->Prenom}}
                                                    @endforeach
                                                    
                                                </td>
                                                <td> 
                                                    @if ($soutenance->etudiants->first())
                                                        @if ($soutenance->etudiants->first()->memoire)
                                                        {{$soutenance->etudiants->first()->memoire->Theme}}
                                                        @endif
                                                    @endif
                                                    
                                                   
                                                    
                                                </td>
                                                <td>
                                                    @if ($soutenance->etudiants->first())
                                                        @if ($soutenance->etudiants->first()->professeur)
                                                        {{$soutenance->etudiants->first()->professeur->Nom_Professeur}} {{$soutenance->etudiants->first()->professeur->Prenom_Professeur}}
                                                        @endif
                                                    @endif
                                                   
                                                </td>
                                                <td>
                                                    @if ($soutenance->etudiants->first())
                                                    
                                                        @if ($soutenance->etudiants->first()->jury)
                                                        @if ($soutenance->etudiants->first()->jury->president)
                                                            
                                                        
                                                        
                                                        {{$soutenance->etudiants->first()->jury->president->Nom_Professeur}} {{$soutenance->etudiants->first()->jury->president->Prenom_Professeur}}
                                                            
                                                        @endif
                                                        @endif
                                                    @endif
                                                 
                                                </td>
                                                <td>

                                                    @if ($soutenance->etudiants->first())
                                                    
                                                        @if ($soutenance->etudiants->first()->jury)
                                                            @if ($soutenance->etudiants->first()->jury->examinateur)
                                                        
                                                                {{$soutenance->etudiants->first()->jury->examinateur->Nom_Professeur}} {{$soutenance->etudiants->first()->jury->examinateur->Prenom_Professeur}}
                                                        
                                                            @endif
                                                        @endif
                                                    @endif
                                                   
                                                </td>
                                                <td>
                                                    @if ($soutenance->etudiants->first())
                                                    
                                                    @if ($soutenance->etudiants->first()->jury)
                                                    @if ($soutenance->etudiants->first()->jury->rapporteur)
                                                        
                                                    
                                                    
                                                    {{$soutenance->etudiants->first()->jury->rapporteur->Nom_Professeur}} {{$soutenance->etudiants->first()->jury->rapporteur->Prenom_Professeur}}
                                                        
                                                    @endif
                                                    @endif
                                                @endif
                                                   
                                                </td>


                                                <td>
                                                    @if ($soutenance->etudiants->first())
                                                    
                                                    
                                                        @if ($soutenance->etudiants->first()->filiere)
                                                            
                                                        
                                                        {{$soutenance->etudiants->first()->filiere->Intitule_Filiere}}
                                                            
                                                        
                                                        @endif

                                                    @endif
                                                </td>
                                                                      
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           @include('partial.footer')
        </div>
        
      
<script>
       document.getElementById('convertButton').addEventListener('click', function() {
    const element = document.getElementById('tableToConvert');
    const clonedTable = element.cloneNode(true);
    const rows = clonedTable.querySelectorAll("tr");
    rows.forEach((row) => {
        const thCell = row.querySelector("th:last-child");
        if (thCell) {
            thCell.style.display = "none";
        }
        const tdCell = row.querySelector("td:last-child");
        if (tdCell) {
            tdCell.style.display = "none";
        }
  });
    const pdfOptions = {
        filename: 'planning.pdf',
        image: { type: 'png', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
    };

    html2pdf()
        .from(clonedTable)
        .set(pdfOptions)
        .save();
});


    document.addEventListener("DOMContentLoaded", function () {
        const searchBar = document.getElementById('search-bar');
        const dataRows = document.querySelectorAll('.data-row');

        searchBar.addEventListener('input', function () {
            const searchTerm = this.value.trim().toLowerCase();

            dataRows.forEach(function (row) {
                const rowData = Array.from(row.querySelectorAll('td')).map(function (cell) {
                    return cell.textContent.trim().toLowerCase();
                });

                if (rowData.some(function (cellData) {
                    return cellData.includes(searchTerm);
                })) {
                    row.style.display = ''; // Afficher la ligne si au moins une cellule correspond
                } else {
                    row.style.display = 'none'; // Masquer la ligne si aucune cellule ne correspond
                }
            });
        });
    });

    
</script>

            
      

@endsection