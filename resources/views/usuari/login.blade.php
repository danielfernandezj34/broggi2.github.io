<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>IES BROGGI - Login</title>
</head>
<body id="body_login">
    <div class="container mt-5">
        @include('extra.missatges')
        <div class="d-flex justify-content-center">
            <div class="mt-2 col-sm-6 col-8 d-flex justify-content-center">
                <img src="{{ asset('img/sems-logo.png') }}" alt=""height="100" >
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card mt-2 col-sm-6 col-8">
                <div class="card-body">
                    <form action="{{ action([App\Http\Controllers\UsuarisController::class, 'login']) }}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-10 col-sm-10 col-md-10">
                                    <form>
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 form-group">
                                                <label for="usuari" class="col-form-label">Usuari</label>
                                                <input type="text" class="form-control" id="usuari" name="usuari" placeholder="Nom d'usuari" value="{{ old('usuari') }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 form-group">
                                                <label for="contrasenya" class="col-form-label">Contrasenya</label>
                                                <input type="password" class="form-control" id="contrasenya" name="contrasenya" value="{{ old('contrasenya') }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 form-group">
                                                <button type="submit" class="btn mb-3 float-right d-flex justify-content-center" id="acceptar_login">Iniciar Sessió</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2">
                                    <img src="{{ asset('img/lineas_colores.PNG') }}" alt="" height="250" id="linies_colors">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="{{ asset('js/app.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> --}}
</html>
