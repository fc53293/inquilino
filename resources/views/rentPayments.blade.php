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
                        <a class="nav-link text-black text-end" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="{{ url('inquilinoProfile/{id}') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="#">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="{{ url('wallet/{id}') }}">Wallet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="{{ url('payment') }}">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="#">Sign Out</a>
                    </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END Nav bar -->
  
  <!-- Banner -->
  <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="content text-center">
      <h1 class="m-5">Pagamentos </h1>    

      <div class="payment">
            <h5 style="font-size: 22px;position: relative; top: 20px;">Pay Invoice</h5>
            
              <div class="form_content">
              <label style="position: relative; top: 30px;">Payment amount</label>
              <h5 style="position: relative; top: 35px; left: 20px;">$</h5>
              <input type="number" class="formAmountInput" value="Amount" id="AmountPay" name="AmountPay"> <br>

              <!--<label>Name</label> <br>
              <input type="text" class="formInput"> <br>-->

              <label>Contribuinte</label> <br>
              <input type="text" class="formInput" id="contriPay"> <br>
              
              <label>Email</label><br>
              <input type="text" class="formInput" id="mailPay"> <br>

              <label>Data</label><br>
              <input type="date" class="formInput" id="datePay"> <br>
            </div>
            <button class="formbttn"> Pay Amount </button>
          
          
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
$(document).ready(function(){
  $(".formbttn").on("click", function(){
    alert("Make the payment.");
    var amountPay = $( "#AmountPay" ).val();
    var contriPay = $( "#contriPay" ).val();
    var mailPay = $( "#mailPay" ).val();
    var datePay = $( "#datePay" ).val();
    var datastr = [amountPay,contriPay,mailPay,datePay];
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
        window.location = "inquilinoProfile/1";  //Mudar para entrar no user atual
      }
  })
  });
});
  
  </script>
  <!-- END Banner -->
</body>
