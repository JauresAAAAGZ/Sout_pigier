<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pigier - Register</title>
     <!-- Bootstrap styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créez votre compte!</h1>
                            </div>
                            <form method="POST" action="{{ route('register') }}" class="user">
                                @csrf
                            <div class="form-group row">
                                <!-- Name -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <x-input-label for="username" :value="__('Username')" />
                                    <x-text-input id="username" class="form-control form-control-user" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                </div>

                                <!-- Service -->
                                <div class="col-sm-6">
                                    <x-input-label for="service" :value="__('Service')" />
                                    <select class="form-select form-select-md mb-3" name="service" id="service" >
                                        <option disabled selected value> Choisir un service</option>
                                        <option value="admin">Administrateur</option>
                                        <option value="Directeur_des_Etudes">Directeur des Etudes</option>
                                        <option value="Coordonateur">Coordonateur</option>
                                        <option value="Assistant_Directeur_des_Etudes">Assistant Directeur des Etudes</option>                                        
                                    </select> 
                                    <x-input-error :messages="$errors->get('service')" class="mt-2" />
                                </div>
                            </div>
                        
                                <!-- Email Address -->
                                <div class="form-group">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" required autocomplete="email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                        
                            <div class="form-group row">
                                <!-- Password -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <x-input-label for="password" :value="__('Mot de passe')" />
                        
                                    <x-text-input id="password" class="form-control form-control-user"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />
                        
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                        
                                <!-- Confirm Password -->
                                <div class= "col-sm-6">
                                    <x-input-label for="password_confirmation" :value="__('Confirmer mot de passe')" />
                        
                                    <x-text-input id="password_confirmation" class="form-control form-control-user"
                                                    type="password"
                                                    name="password_confirmation" required autocomplete="new-password" />
                        
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                            <hr>
                                <div class="text-center">
                                    <x-primary-button class="btn btn-primary btn-user btn-block">
                                        {{ __('S\'enregistrer') }}
                                    </x-primary-button>

                                    <a class="large" href="{{ route('login') }}">
                                        {{ __('Déjà un compte?') }}
                                    </a>
                        
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

     <!-- Bootstrap JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>