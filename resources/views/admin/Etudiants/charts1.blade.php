<!-- resources/views/etudiant/liste.blade.php -->
@extends('layout.app')

@section('content')

<!-- Additional styles for your PV -->
<style>
   body {
   font-family: Arial, sans-serif;
  
   }
   body {
   color: black;
   width: 35cm; 
   height: 15cm; 
   
   }
   #mon_div {
      margin-left: 20px;
      margin-top: 30px
   }

   #mon_div1 {
        
        margin-top: 11px;
        margin-bottom: 11px
    }
   h1 {
   text-align: center;
   }
   table {
   width: 95%;
   border-collapse: collapse;
   margin-top: -6px;
   }
   th, td {
   border: 1px solid black;
   padding: 3px;
   text-align: left;
   }
   th {
   background-color: #f2f2f2;
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
   .rowspan {
   vertical-align: middle;
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

                        <h1>Liste des Etudiants</h1>

                           <table>
                              @foreach ($etudiants as $etudiant)
                                 <tr>
                                       <td>
                                          <label for="etudiants">{{ $etudiant->Matricule }} {{$etudiant->Nom}} {{$etudiant->Prenom}}</label> <input type="checkbox" class="student-checkbox" name="etudiants[]" value="{{ $etudiant->id }}" data-name="{{ $etudiant->nom }}">
                                       </td>
                                      
                                 </tr>
                              @endforeach
                           </table>
                           <button id="generateButton">Générer et Télécharger PVs</button>
                </div>
                <!-- /.container-fluid -->
               
              
                
               <div id="elementToConvert" style="font-size: 12.5px;">
                  <div id="mon_div">
                  <img src="{{ asset('images/PigierLogo.png') }}" alt="Mon Image">
                  <h1 style="font-size: 27px;">PROCES-VERBAL DE SOUTENANCE DE MEMOIRE</h1><br>
                  <div class="left" style="float: left; width: 50%;" style="font-size: 36px;">Autorisée par la Note de Service N°</div>
                  <div class="right" style="float: left; width: 40%;" style="font-size: 16px;">MESRS/DGES/DOSES/SEPES/DSPI/SA</div>
                  <br/>
                  <div>Diplôme : Licence Professionnelle</div>
                  <div>Spécialité :
                     @if($etudiant->filiere)
                     {{ $etudiant->filiere->Intitule_Filiere }}
                     @endif
                  </div>
                  <div class="left" style="float: left; width: 25%;" style="font-size: 36px;">Session de Mai 2023</div>
                  <div class="center" style="float: left; width: 26%;" style="font-size: 26px;">N° du jury : 
                     @if ($etudiant->jury)
                     {{$etudiant->jury->NumJury}}
                     @endif
                  </div>
                  <div class="right" style="float: left; width: 18.70%;" style="font-size: 26px;">Salle :  
                     @if ($etudiant->soutenance)
                     {{$etudiant->soutenance->Salle_Soutenance}}
                     @endif
                  </div>
                  <div class="left" style="float: left; width: 50%;" style="font-size: 26px;">Date de Soutenance :  
                     @if ($etudiant->soutenance)
                     {{$etudiant->soutenance->Date_Soutenance}}
                     @endif
                  </div>
                  <div class="right" style="float: left; width: 20.60%;" style="font-size: 26px;">Heure : 
                     @if ($etudiant->soutenance)
                     {{$etudiant->soutenance->Heure_Soutenance}}
                     @endif
                  </div>
                  <p></p>
                  <br>
                  <br/>
                  <table style="font-size: 11.5px;">
                     <thead>
                        <tr>
                           <td style="width: 0.47%;" class="left";>N° Matricule de l’Etudiant(e)</td>
                           <td style="width: 0.05%;" class="center"> : </td>
                           <td style="width: 1%;" class="left">{{ $etudiant->Matricule }}</td>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Nom et Prenom(s)</td>
                           <td style="color: black;" class="center"> : </td>
                           <td>
                              <p>{{$etudiant->Nom}} {{$etudiant->Prenom}}</p>
                           </td>
                        </tr>
                        <tr>
                           <td>Date et Lieu de Naissance</td>
                           <td  style="color: black;" class="center"> : </td>
                           <td>
                              <p>{{$etudiant->Date_Naissance}} {{$etudiant->Lieu_Naissance}}</p>
                           </td>
                        </tr>
                        <tr>
                           <td>Thème</td>
                           <td style="color: black;" class="center"> : </td>
                           <td>
                              <p>
                                 @if ($etudiant->memoire)
                                 {{ $etudiant->memoire->Theme}}
                                 @endif
                              </p>
                           </td>
                        </tr>
                        <tr>
                           <td>Pièce d’identité (Carte d’identité/Passeport/etc.)</td>
                           <td style="color: black;" class="center"> : </td>
                           <td>
                              <p></p>
                              <p></p>
                              <p></p>
                              <p></p>
                           </td>
                        </tr>
                        <tr>
                           <td><div id="mon_div1">Signature de l’Etudiant(e)</div></td> 
                           <td style="color: black;" class="center"> : </td>
                           <td>
                              <p></p>
                              <p></p>
                              <p></p>
                              <p></p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <br>
                  <table style="font-size: 11.5px;">
                     <tr>
                        <th style="width: 6%;" class="center">CRITÈRES D’ÉVALUATION</th>
                        <th style="width: 1%;" class="center">OBSERVATIONS</th>
                        <th style="width: 0.5%;" class="center">NOTE</th>
                     </tr>
                     <tr>
                        <td>1. Forme du Mémoire</td>
                        <td rowspan="4"></td>
                        <td rowspan="4" class="center" style="color: black;">
                           <hr style="background-color: black; height: 2px; border: none;">
                           04,00
                        </td>
                     </tr>
                     <tr>
                        <td>1.1. Esthétique du Document (Propreté - Lisibilité - Page de Garde, Qualité des illustrations: Tableaux- Graphiques. Chiffres-etc.)</td>
                     </tr>
                     <tr>
                        <td>1.2. Structure du Document (Rubriques obligatoires- Articulation et Proportion des Parties-Chapitres Introduction. Conclusion, etc.)</td>
                     </tr>
                     <tr>
                        <td>1.3. Rédaction (Orthographe, Grammaire, Style, Syntaxe, etc.)</td>
                     </tr>
                     <tr>
                        <td>2. Fond du Mémoire</td>
                        <td rowspan="4"></td>
                        <td rowspan="4" class="center"style="color: black;">
                           <hr style="background-color: black; height: 2px; border: none;">
                           06,00
                        </td>
                     </tr>
                     <tr>
                        <td>2.1. Maîtrise de la Problématique et de la Littérature</td>
                     </tr>
                     <tr>
                        <td>2.2. Rigueur Méthodologique (Orthographe, Grammaire, Style, Syntaxe, etc.)</td>
                     </tr>
                     <tr>
                        <td>2.3. Pertinence des Résultats Pour la Structure d’Accueil, la Société</td>
                     </tr>
                     <tr>
                        <td>3. Exposé du Candidat (Speech)</td>
                        <td rowspan="4"></td>
                        <td rowspan="4" class="center" style="color: black;">
                           <hr style="background-color: black; height: 2px; border: none;">
                           05,00
                        </td>
                     </tr>
                     <tr>
                        <td>3.1. Qualité des Supports de Présentation (Powerpoint, Réalisations telles que: Application développée Solution inventée, etc.)</td>
                     </tr>
                     <tr>
                        <td>3.2 Rigueur du Raisonnement (Cohérence, Logique de l’Exposé, clarté, Précision, Diction, Correction de l’Expression, etc.)</td>
                     </tr>
                     <tr>
                        <td>3.3. Gestion du Temps et Expression Corporelle</td>
                     </tr>
                     <tr>
                        <td>4. Défense du Mémoire par le Candidat (Intelligence Situationnelle)</td>
                        <td rowspan="4"></td>
                        <td rowspan="4" class="center" style="color: black;">
                           <hr style="background-color: black; height: 2px; border: none;">
                           05,00
                        </td>
                     </tr>
                     <tr>
                        <td>4.1. Expression corporelle (Tenue, aisance, courtoisie...)</td>
                     </tr>
                     <tr>
                        <td>4.2. Réponse aux Questions (Précision, Concision, Justesse, etc.)</td>
                     </tr>
                     <tr>
                        <td>4.3. Gestion de Situations difficiles lors de la Soutenance Observations Complémentaires du Jury</td>
                     </tr>
                     <tr>
                        <td class="center" rowspan="4" style="font-size: 10.5px;">Observations Complémentaires du Jury</td>
                        <td rowspan="4"></td>
                        <td rowspan="4" class="center" style="color: black;">
                           <hr style="background-color: black; height: 2px; border: none; margin-top: 20px;">
                           20,00
                        </td>
                     </tr>
                  </table>
                  <br>
                  <h2 class="center" style="font-size: 11.5px;">Mention (Cochez la case en dessous la mention)</h2>
                  <table style="font-size: 11.5px;">
                     <thead>
                        <tr>
                           <th class="center">Excellent [18-20]</th>
                           <th class="center">Très-Bien [16-18[</th>
                           <th class="center">Bien [14-16[</th>
                           <th class="center">Assez-Bien [12-14[</th>
                           <th class="center">Passable [10-12[</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <p></p>
                              <p></p>
                           </td>
                           <td>
                              <p></p>
                              <p></p>
                           </td>
                           <td>
                              <p></p>
                              <p></p>
                           </td>
                           <td>
                              <p></p>
                              <p></p>
                           </td>
                           <td>
                              <p></p>
                              <p></p>
                           </td>
                     </tbody>
                  </table>
                  <br>
                  <h2 class="center" style="font-size: 12.5px;">Cotonou, le ...........................................................................................................................................................</h2>
                  <h2 class="left" style="font-size: 12.5px;">Fonction, Signature, NOM, Prénoms, Grade (Master/Ingénieur/Docteur/MA/MC/PT) des membres du Jury</h2>
                  <table style="font-size: 10.5px;">
                     <thead>
                        <tr>
                           <th>Fonction</th>
                           <th>Examinateur</th>
                           <th>Rapporteur</th>
                           <th>Président</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td><div id="mon_div1">Signature</div></td>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td>NOM et Prénoms</td>
                           <td>  
                              @if ($etudiant->jury)
                              {{$etudiant->jury->president->Nom_Professeur}} {{$etudiant->jury->president->Prenom_Professeur}}
                              @endif
                           </td>
                           <td>  
                              @if ($etudiant->jury)
                              {{$etudiant->jury->examinateur->Nom_Professeur}} {{$etudiant->jury->examinateur->Prenom_Professeur}}
                              @endif
                           </td>
                           <td>
                              @if ($etudiant->jury)
                              {{$etudiant->jury->rapporteur->Nom_Professeur}} {{$etudiant->jury->rapporteur->Prenom_Professeur}}
                              @endif
                           </td>
                        </tr>
                        <tr>
                           <td>Grade</td>
                           <td>  
                              @if ($etudiant->jury)
                              {{$etudiant->jury->president->Grade}}
                              @endif 
                           </td>
                           <td>  
                              @if ($etudiant->jury)
                              {{$etudiant->jury->examinateur->Grade}}
                              @endif 
                           </td>
                           <td> 
                              @if ($etudiant->jury)
                              {{$etudiant->jury->rapporteur->Grade}}
                              @endif 
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
            <!-- End of Main Content -->
        </div>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages -->
<script src="js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="js/demo/chart-bar-demo.js"></script>
<!-- Dans votre vue Blade -->
<!-- Dans votre vue Blade -->
<!--<script>
   document.getElementById('generateButton').addEventListener('click', function () {
       // Récupérez les étudiants sélectionnés
       const selectedStudents = document.querySelectorAll('.student-checkbox:checked');
       
       // Créez un div temporaire pour stocker le contenu HTML
       const tempContainer = document.createElement('div');
       
       // Ajoutez le contenu HTML de chaque étudiant sélectionné au div temporaire
       selectedStudents.forEach(function (student) {
           const studentId = student.value;
           const studentName = student.dataset.name; // Vous devrez définir cela dans votre balise HTML

           // Sélectionnez l'élément à convertir en PDF pour cet étudiant (par exemple, par son ID)
           const elementToConvert = document.getElementById('elementToConvert' + studentId);

           // Clonez l'élément et ajoutez-le au div temporaire
           const clonedElement = elementToConvert.cloneNode(true);
           tempContainer.appendChild(clonedElement);
       });

       // Utilisez html2pdf pour générer et télécharger le PDF
       html2pdf()
           .from(tempContainer)
           .save(studentName);
   });
</script>-->



@endsection
