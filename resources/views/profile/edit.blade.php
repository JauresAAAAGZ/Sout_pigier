<x-app-layout>
    
@extends('layout.app')
@section('content')

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        @include('partial.header')
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
           

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        @include('partial.footer')
        <!--End of Footer -->
        </div>
    </div>
@endsection
</x-app-layout>