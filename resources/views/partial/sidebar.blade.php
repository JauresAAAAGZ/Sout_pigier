 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pigier-Soutenance</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menus
    </div>

    <!-- Nav Item - Liste Etudiants -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('etudiants.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Liste des étudiants</span></a>
    </li>

    <!-- Nav Item - Filiere-->
    <li class="nav-item">
        <a class="nav-link" href="{{route('filieres.index')}}">
            <i class="fas fa-user-friends"></i>
            <span>Filiere</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('soutenances.index')}}">
            <i class="fas fa-book"></i>
            <span>Soutenance</span></a>
    </li>
    
    


      <!-- Nav Item - Professeur-->
      <li class="nav-item">
        <a class="nav-link" href="{{route('professeurs.index')}}">
            <i class="fas fa-glasses"></i>
            <span>Professeur</span></a>
    </li>

      <!-- Nav Item - Jury-->
      <li class="nav-item">
        <a class="nav-link" href="{{route('jurys.index')}}">
            <i class="fas fa-edit"></i>
            <span>Jury</span></a>
    </li>


     <!-- Nav Item - Memoire-->
     <li class="nav-item">
        <a class="nav-link" href="{{route('memoires.index')}}">
            <i class="fas fa-book"></i>
            <span>Memoire</span></a>
    </li>
   

    <!-- Nav Item - PV -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('charts')}}">
            <i class="far fa-file-alt"></i>
            <span>Procès Verbal</span></a>
    </li>

    <!-- Nav Item - Planning/Soutenance-->
    <li class="nav-item">
        <a class="nav-link" href="{{route('soutenances.info')}}">
            <i class="far fa-calendar-alt"></i>
            <span>Planning</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Connexions</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Connexions</h6>
                <a class="collapse-item" href={{route('login')}}>Connexion</a>
                <a class="collapse-item" href={{route('register')}}>Enregistrement</a>
                <a class="collapse-item" href={{route('password.request')}}>Mot de passe oublié</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>

   
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
