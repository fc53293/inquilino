<head>
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="UniRent">
    <title>Wallet | UniRent</title>
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
    <script src="/JS/scripts.js"></script>
</head>

<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
<div class="container">
        <a class="navbar-brand" href="/senhorio/home">
            <img src="/img/logo/UniRent-V2.png" alt="" width="100">
        </a>
        <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">

                        <style>
                        .dropbtn {
                            
                            background: url('/img/blankProfileImg.png') no-repeat;
                            background-size: 50px 50px;
                            color: white;
                            font-size: 16px;
                            border: none;
                            cursor: pointer;
                            border-radius: 50%;
                            padding: 25px 25px;
                            
                        }

                        .dropbtn:hover, .dropbtn:focus {
                            background-color: #2980B9;
                        }

                        .dropdown {
                            position: relative;
                            
                            display: inline-block;
                        }

                        .dropdown-content {
                            right: 0px;
                            top: 55px;
                            display: none;
                            position: absolute;
                            background-color: #f1f1f1;
                            min-width: 160px;
                            overflow: auto;
                            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                            z-index: 1;
                        }

                        .dropdown-content a {
                            color: black;
                            padding: 12px 16px;
                            text-decoration: none;
                            display: block;
                        }

                        .outro {
                            color: black;
                            padding: 12px 16px;
                            text-decoration: none;
                            display: block;
                            border-bottom: 1px outset rgba(0,0,0,0.2);
                            text-align: right;
                            margin: 0px;
                        }

                        

                        .dropdown a:hover {background-color: #ddd;}

                        .show {display: block;}

                        div#popupContact {
 
                            margin-top: 10%;
                            margin-left: 10%;
                        }
                        </style>

                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn"></button>
                            <div id="myDropdown" class="dropdown-content">
                            <p class="outro">Hi, {{$data[0]['PrimeiroNome']}}!</p>
                            <a href="{{ url('/home') }}">Home</a>
                            <a href="{{ url('/inquilinoProfile/2') }}">Profile</a>
                            <a href="{{ url('/chat') }}">Messages</a>
                            <a href="{{ url('/wallet/2') }}">Wallet</a>
                            <a href="{{ url('/payment/'.$data[0]['IdUser']) }}">Pagamentos</a>
                            <a href="#">Sign Out</a>
                            </div>
                        </div>

                        <script>
                        /* When the user clicks on the button, 
                        toggle between hiding and showing the dropdown content */
                        function myFunction() {
                            document.getElementById("myDropdown").classList.toggle("show");
                        }

                        // Close the dropdown if the user clicks outside of it
                        window.onclick = function(event) {
                            if (!event.target.matches('.dropbtn')) {
                            var dropdowns = document.getElementsByClassName("dropdown-content");
                            var i;
                            for (i = 0; i < dropdowns.length; i++) {
                                var openDropdown = dropdowns[i];
                                if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                                }
                            }
                            }
                        }
                        </script>        
            </ul>
        </div>
        </div>
  </nav>

    <!-- Profile -->
    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center pt-5 ">
        <div >
            <div class="wallet-container text-center">
            <p class="page-title"><h2 class="font-effect__blue">MyUniRent Wallet</h2><i class="fa fa-user"></i></p>
            @foreach ($data as $info)

            <div class="amount-box text-center pt-2">
                <img src="https://lh3.googleusercontent.com/ohLHGNvMvQjOcmRpL4rjS3YQlcpO0D_80jJpJ-QA7-fQln9p3n7BAnqu3mxQ6kI4Sw" alt="wallet">
                <p class="font-effect__blue p-2">Total Balance:</p>
                <p class="amount">{{ $info['Saldo'] }} €</p>
            </div>
            
            <div class="btn-group text-center">
                <button type="button" class="btn btn-outline-primary" id="btnAddMoney" onclick="div_show()">Add Money</button>
            </div>

                <div class="txn-history">
                    <h2 class="font-effect__blue pb-3">History</h2>
                    @foreach($data2 as $info)
                        <p class="txn-list mb-3">Payment to UniRent account<span class="{{ $info->Valor >= 0 ? 'credit-amount' : 'debit-amount' }}">{{ $info['Valor'] }} €</span></p>

                    @endforeach
                </div>

                <div id="abc">
                    <!-- Popup Div Starts Here -->
                    <div id="popupContact">
                        <!-- Contact Us Form -->
                        <form action="{{url('http://myunirent.pt/walletAdd/'.$info['IdUser']) }}"  id="formAddSaldo" method="POST" name="form">
                            <img id="close" src="/img/closeButton.png" onclick ="div_hide()">
                            <h1 class="font-effect__blue p-2">Amount</h1>
                            <input id="name2" name="nameUser" placeholder="Amount" type="hidden" value="{{ $info['Username'] }}">
                            <input id="name" name="amountToAdd" placeholder="Amount" type="number" min="0" require>
                            <br><br><br>

                            <!--<a href="javascript:%20check_empty()" id="submit" >Add</a>-->
                            <button class="btn btn-outline-primary" id="submitWallet" name="sub" type="submit" onclick="return check_empty()" href="javascript:%20check_empty()">Add</button>
                        </form>
                        </div>
                        <!-- Popup Div Ends Here -->
                    </div>
                </div>
                <script>
                    
                    $('#formAddSaldo').submit(function(e) {
                    //alert("ola");
                    e.preventDefault();
                    req = $.ajax({
                        type: 'POST',
                        cache: false,
                        dataType: 'JSON',
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        success: function(data) {
                            console.log(data);
                        }
                    });
                    
                    req.done(function(data){
                        //$('#totalAVGrating').fadeOut(500).fadeIn(500);
                        div_hide();
                        $('.amount-box').fadeOut(1000).fadeIn(1000);
                        setTimeout(function(){
                            $('.amount').text(data.res+" €");
                        }, 1000);
                        
                        //alert("feito");
                    });
                    

                    });
                </script>
        </div>
    </div>

    <!-- END Profile -->
    @endforeach
</body>