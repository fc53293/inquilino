<head>
  <!DOCTYPE html>
  <html lang="en">
  <meta charset="UTF-8">
  <meta name="author" content="UniRent">
  <title>LOGIN | UniRent</title>
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
  <!-- END Nav bar -->
  
  <!-- Banner -->
  <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="content profile-container text-center">
      <h1 class="m-5 font-effect__blue">Payments</h1>    

      <div class="payment p-2" style="border-radius: 10px">
            
              <div class="form_content">
              <form action="{{url('/pay/') }} " method="POST">
                <label class="p-2 font-effect__blue" style="position: relative; top: 30px;">Payment amount</label>
                <h5 style="position: relative; top: 35px; left: 20px;">€</h5>
                <input type="number" class="formAmountInput" id="AmountPay" name="AmountPay"> <br>
    
                <label class="p-2 font-effect__blue" >Contribuinte</label> <br>
                <input type="text" class="formInput" id="contriPay" value="{{$data[0]['NIF']}}" readonly="readonly" name="NIF"> <br>
                
                <label class="p-2 font-effect__blue">Email</label><br>
                <input type="text" class="formInput" id="mailPay" value="{{$data[0]['Email']}}" readonly="readonly" > <br>

                <label class="p-2 font-effect__blue">Data</label><br>
                <input type="date" class="formInput" id="datePay" value="<?php echo date('Y-m-d'); ?>" name="Date"> <br>
              </div>
              <button type="submit" class="mt-5 btn btn-outline-primary" id="formbttn"> Pay Amount </button>
            </form>
          
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
$(document).ready(function(){
  $("#formbttn").on("click", function(){
    alert("Make the payment.");
    
    var amountPay = $( "#AmountPay" ).val();
    var contriPay = $( "#contriPay" ).val();
    var mailPay = $( "#mailPay" ).val();
    var datePay = $( "#datePay" ).val();
    var datastr = [contriPay,amountPay,mailPay,datePay];
    $.ajax({
      type: "POST",
      url: "/pay", // need to create this post route
      data: {
        IdInquilino: 1,
        IdSenhorio: 2,
        Valor: amountPay,
        Data: datePay,
        Contribuinte: contriPay
      },
      cache: false,
      success: function (data) {
        // window.location = "inquilinoProfile/1";  //Mudar para entrar no user atual
      }
  })
  });
});
  
  </script>
  <!-- END Banner -->
</body>
