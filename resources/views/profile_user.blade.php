<head>
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="UniRent">
    <title>User | UniRent</title>
    <link rel="shortcut icon" type="image/jpg" href="img/logo/UniRent-V2.png" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/img/logo/UniRent-V2.png" alt="" width="100">
            </a>
            <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="#">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="#">Wallet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="#">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="register.html">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END Nav bar -->

    <!-- Profile -->
    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center pt-5 ">
        <div class="container profile-container">
            <div class="row">
                <!--<div class="col-4 profile-container__icon">
          <img class="m-3" src="img/logo/UniRent-V2.png" alt="" width="100">
                </div>-->
                <!-- Cartão do gajo-->
                <div class="col-3 pt-2">
                    <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <!-- Team Thumb-->
                        <div class="advisor_thumb"><img src="/img/blankProfileImg.png" alt="img profile">
                            <!-- Social Info-->
                            <div class="social-info"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i
                                        class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <!-- Team Details-->
                        @foreach ($data as $user)
                        <div class="single_advisor_details_info">
                            <h6>{{ $user['PrimeiroNome'] }} {{ $user['UltimoNome'] }}</h6>
                            <p class="designation">{{ $user['TipoConta'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <h1 class="pt-3 profile-container__welcomeUser">Welcome, {{ $user['PrimeiroNome'] }}</h1>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col profile-container__information">

                            @foreach ($data as $user)
                            <form action="/edit/{{ $user['Username'] }}" method="POST">
                                <input type="hidden" name="username" value="{{$user['Username']}}">
                                <div class="form-group row">
                                    <div class="form-group col">
                                        <h2 class="pt-3">Username: </h2>
                                        <div class="col-sm-3 ">
                                            <input type="text" class="form-control mt-2" id="inputPassword"
                                                name="nomeUser" value="{{ $user['Username'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <h2 class="pt-3">Primeiro Nome: </h2>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control mt-2" id="inputPassword"
                                                name="primeiroNome" value="{{ $user['PrimeiroNome'] }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col">
                                        <h2 class="pt-3">Email:</h2>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control mt-2" id="inputPassword" name="mail"
                                                placeholder="CHANGE ME!" value="{{ $user['Email'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <h2 class="pt-3">Último Nome: </h2>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control mt-2" id="inputPassword"
                                                name="ultimoNome" value="{{ $user['UltimoNome'] }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col">
                                        <h2 class="pt-3">Morada:</h2>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control mt-2" id="inputPassword"
                                                placeholder="CHANGE ME!" name="morada" value="{{ $user['Morada'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <h2 class="pt-3">Data de Nascimento:</h2>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control mt-2" id="inputPassword"
                                                placeholder="CHANGE ME!" value="{{ $user['Nascimento'] }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="mt-3 btn btn-primary ">Make Changes!</button>
                            </form>
                            @endforeach

                            <h2 class="mt-5 p-2 font-effect__blue">Alugueres:</h2>
                            @foreach ($rent as $rentData)
                            <!--<div class="row mx-2 text-center profile-container__recentViewed">
                  <div class="col m-1 recentViewed">
                    <img class="m-3" src="img/logo/UniRent-V2.png" alt="" width="50">
                    <h3>{{ $rentData['Localizacao'] }}</h3>
                    <h3>{{ $rentData['TipoPropriedade'] }}</h3>
                  </div>
                  <div class="col m-1 recentViewed">
                    <img class="m-3 recentViewed__image" src="img/logo/UniRent-V2.png" alt="" width="50">
                    <h3>Localidade Propriedade</h3>
                  </div>
                  <div class="col m-1 recentViewed">
                    <img class="m-3 recentViewed__image" src="img/logo/UniRent-V2.png" alt="" width="50">
                    <h3>Localidade Propriedade</h3>
                  </div>
                </div>-->
                            <div class="card text-center">
                                <div class="card-header">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#home">Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#profile">Map</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#contact">Contact</a>
                                        </li>
                                    </ul>
                                </div>

                                <<<<<<< Updated upstream <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane active" id="home">
                                            <h3>Tipo: {{ $rentData['TipoPropriedade'] }}</h3>
                                            <h3>Localização: {{ $rentData['Localizacao'] }}</h3>
                                            <h3>Area: {{ $rentData['AreaMetros'] }} m2</h3>
                                        </div>


                                        <div class="tab-pane fade" id="profile">
                                            <h3>Aqui vai aparecer o mapa!</h3>

                                        </div>
                                        <div class="tab-pane fade" id="contact">...</div>
                                    </div>
                            </div>
                            =======
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane active" id="home">
                                        <img class="img-thumbnail" src="/img/room1.jpg" alt="img profile"
                                            style="float:right" width="200" height="100">
                                        <!--<div class="d-inline-flex p-2">-->
                                        <div class="d-flex flex-column">
                                            <div class="p-2">
                                                <h3>Tipo: {{ $rentData['TipoPropriedade'] }}</h3>
                                            </div>
                                            <div class="p-2">
                                                <h3>Localização: {{ $rentData['Localizacao'] }}</h3>
                                            </div>
                                            <div class="p-2">
                                                <h3>Area: {{ $rentData['AreaMetros'] }} m2</h3>
                                            </div>
                                        </div>
                                        <!--<h3 >Tipo: {{ $rentData['TipoPropriedade'] }}</h3>                       
                          <h3>Localização: {{ $rentData['Localizacao'] }}</h3>
                          <h3>Area: {{ $rentData['AreaMetros'] }} m2</h3>
                        </div>-->
                                    </div>
                                    <div class="tab-pane fade" id="profile">
                                        <h3>Aqui vai aparecer o mapa!</h3>
                                        >>>>>>> Stashed changes
                                    </div>
                                    <div class="tab-pane fade" id="contact">...</div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END Profile -->
</body>