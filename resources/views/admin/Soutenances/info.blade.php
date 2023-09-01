@extends('layout.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

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
                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Le Planning des Soutenances</h1>
                        <button id="convertButton" class="btn btn-primary">Generer Planning</button>
                    </div>
                    
                    <!-- DataTales -->
                    <div class="card shadow mb-4" >
                        <div class="card-header py-3 col-12">
                            <h6 class="m-0 font-weight-bold text-primary col-6">Planning</h6>
                        </div>
                        <div class="">
                            <div class="" >
                                <table class="table" id="tableToConvert" style="font-size: 15px;">
                                    <thead>
                                        <tr>
                                            <th>Jury</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Salle</th>
                                            <th>Nom Prenom</th>
                                            <th>Thème</th>
                                            <th>Directeur</th>
                                            <th>Président</th>
                                            <th>Examinateur</th>
                                            <th>Rapporteur</th>
                                          
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
                                            <tr>
                                                <td>
                                                    {{$soutenance->etudiants->first()->jury->NumJury}}
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
                                                    
                                                    {{$soutenance->etudiants->first()->memoire->Theme}}
                                                    
                                                </td>
                                                <td>
                                                    {{$soutenance->etudiants->first()->professeur->Nom_Professeur}} {{$soutenance->etudiants->first()->professeur->Prenom_Professeur}}
                                                </td>
                                                <td>
                                                    {{$soutenance->etudiants->first()->jury->President}}
                                                </td>
                                                <td>
                                                    {{$soutenance->etudiants->first()->jury->Examinateur}}
                                                </td>
                                                <td>
                                                    {{$soutenance->etudiants->first()->jury->Rapporteur}}
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
        
      
<script>
          document.getElementById('convertButton').addEventListener('click', function () {
    const tableElement = document.getElementById('tableToConvert'); // Remplacez par l'ID de votre tableau

    const pdfOptions = {
        margin: { top: 10, right: 10, bottom: 10, left: 10 },
        filename: 'planning.pdf',
        image: { type: 'png', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
    };

    const tableRows = tableElement.querySelectorAll('tr');
    const tablePages = [];
    let currentPage = null;

    tableRows.forEach((row, rowIndex) => {
        if (rowIndex % 20 === 0) { // Changez 20 pour le nombre de lignes par page souhaité
            if (currentPage) {
                tablePages.push(currentPage);
            }
            currentPage = document.createElement('table');
            currentPage.innerHTML = tableElement.innerHTML;
        }
        currentPage.appendChild(row.cloneNode(true));
    });

    if (currentPage) {
        tablePages.push(currentPage);
    }

    const pdfPromises = tablePages.map((page, index) => {
        return html2pdf()
            .from(page)
            .set(pdfOptions)
            .outputPdf();
    });

    Promise.all(pdfPromises).then(pdfFiles => {
        const mergedPdf = new PDFDocument();
        pdfFiles.forEach(pdfFile => {
            const pdfBuffer = pdfFile.output();
            const pdfDoc = PDFDocument.load(pdfBuffer);
            pdfDoc.copyPagesTo(mergedPdf, [0]);
        });

        const mergedPdfBuffer = mergedPdf.save();

        // Créez un lien de téléchargement pour le fichier PDF final
        const blob = new Blob([mergedPdfBuffer], { type: 'application/pdf' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'planning.pdf';
        a.style.display = 'none';
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
    });
});

</script>

            
      

@endsection