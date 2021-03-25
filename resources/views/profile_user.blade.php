<head>
  <!DOCTYPE html>
  <html lang="en">
  <meta charset="UTF-8">
  <meta name="author" content="UniRent">
  <title>ADMIN | UniRent</title>
  <link rel="shortcut icon" type="image/jpg" href="img/logo/UniRent-V2.png"/>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="/CSS/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>  
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo/UniRent-V2.png" alt="" width="100">
      </a>
      <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto"></div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-black text-end" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black text-end" href="login.html">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black text-end" href="register.html">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END Nav bar -->
  
  <!-- Banner -->
  <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="container profile-container"> 
      <div class="row">
        <div class="col-4 profile-container__icon">
          <img class="m-3" src="img/logo/UniRent-V2.png" alt="" width="100">
        </div>
        <div class="col-8">
          <div class="row">
            <div class="col">
              <h1 class="pt-3 profile-container__welcomeUser">Welcome,</h1>
              <h1 class="pb-3 profile-container__nameUser" id="nameUser">Nome</h1>
            </div>
          </div>
          <div class="row">
            <div class="col profile-container__information">

            @foreach ($data as $user)
<!-- -->        <form action="/edit" method="POST">
                  
                  <input type="hidden" name="username" value="{{$user['Username']}}">
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">
                      <h2 class="p-2">Username: </h2>
                    </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control mt-2" id="inputPassword" name="nomeUser" value="{{ $user['Username'] }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">
                      <h2 class="p-2">Email:</h2>
                    </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control mt-2" id="inputPassword" name="mail" placeholder="CHANGE ME!" value="{{ $user['Email'] }}"> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">
                      <h2 class="p-2">Morada:</h2
                        ></label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control mt-2" id="inputPassword" placeholder="CHANGE ME!" value="{{ $user['Morada'] }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">
                      <h2 class="p-2">Data de Nascimento:</h2>
                    </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control mt-2" id="inputPassword" placeholder="CHANGE ME!" value="{{ $user['Nascimento'] }}">
                    </div>
                  </div>
                  <button type="submit" class="m-2 btn btn-primary" >Make Changes!</button>
                </form>
<!-- -->  @endforeach

              <h2 class="mt-5 p-2 font-effect__blue">Recentes:</h2>
              <div class="row mx-2 text-center profile-container__recentViewed">
                <div class="col m-1 recentViewed">
                  <img class="m-3" src="img/logo/UniRent-V2.png" alt="" width="50">
                  <h3>Localidade Propriedade</h3>
                </div>
                <div class="col m-1 recentViewed">
                  <img class="m-3 recentViewed__image" src="img/logo/UniRent-V2.png" alt="" width="50">
                  <h3>Localidade Propriedade</h3>
                </div>
                <div class="col m-1 recentViewed">
                  <img class="m-3 recentViewed__image" src="img/logo/UniRent-V2.png" alt="" width="50">
                  <h3>Localidade Propriedade</h3>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div> 
    </div>
  </div>
  <!-- END Banner -->

</body>
