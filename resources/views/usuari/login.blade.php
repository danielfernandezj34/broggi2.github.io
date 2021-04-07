<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>IES BROGGI</title>
</head>
<body id="body_login">
<img src="{{ asset('img/logo.png') }}" alt=""height="50" id="logo_login">
<div class="container" id="login">
<div class="card mt-2 col-sm-8">
    <div class="card-body">
        <form>
            <img src="{{ asset('img/lineas_colores.PNG') }}" alt="" height="250" id="linies_colors">
        <div class="form-group">
          <label for="usuari" class="col-sm-10 col-form-label"> Usuari</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="usuari">
          </div>
        </div>
        <div class="form-group">
          <label for="contrasenya" class="col-sm-10 col-form-label">Contrasenya</label>
          <div class="col-sm-10">
          <input type="password" class="form-control" id="contrasenya">
          </div>
        </div>


        <button type="submit" class="btn mb-3 float-right" id="acceptar_login">Iniciar Sessió</button>
      </form>
    </div>
  </div>
</div>

</body>
<script src="{{ asset('js/app.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> --}}
</html>
