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

                <input type="hidden" class="formInput" value="{{$idRent}}" name="idRent">
              </div>
              <button type="button" class="mt-5 btn btn-outline-primary" id="formbttn" onclick="div_show();"> Pay With Paypal </button>
              <button type="submit" class="mt-5 btn btn-outline-primary" id="formbttn" > Pay From Wallet </button>
            </form>
          
      </div>
    </div>
  </div>
  <div id="abc">
                    <!-- Popup Div Starts Here -->
                    <div id="popupContact">
                        <!-- Contact Us Form -->
                           
                            <div class="p-2" id="smart-button-container">
                                <img id="close" src="/img/closeButton.png" onclick ="div_hide()">
                                <div style="text-align: center"><h3>Description</h3><input type="text" name="descriptionInput" id="description" maxlength="127" placeholder="Description" value=""></div>
                                <p id="descriptionError" style="visibility: hidden; color:red; text-align: center;">Please enter a description</p>
                                <div style="text-align: center"><h3>Amount</h3><input name="amountInput" type="number" id="amount" value="" placeholder="100€"><span></span></div>
                                <p id="priceLabelError" style="visibility: hidden; color:red; text-align: center;">Please enter a price</p>
                                <div id="invoiceidDiv" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value="" ></div>
                                <p id="invoiceidError" style="visibility: hidden; color:red; text-align: center;">Please enter an Invoice ID</p>
                                <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
                            </div>
                            

                            <!--<a href="javascript:%20check_empty()" id="submit" >Add</a>-->
                            <!-- <button id="submitWallet" name="sub" type="submit" onclick="return check_empty()" href="javascript:%20check_empty()">Add</button> -->
                        <!-- </form> -->
                    </div>
                        <!-- Popup Div Ends Here -->
                </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
$(document).ready(function(){
  $("form").submit( function(){
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
  <script src="https://www.paypal.com/sdk/js?client-id=AYJGD5inw4UzvP97ZAF5D7I0z_oQXv5QXAfwQSGk_UogddNFuZsEZw6NkCD5Kaxz2vfJGZlrCyn4q4JD&currency=EUR" data-sdk-integration-source="button-factory"></script>
                <script>
                function initPayPalButton() {
                    var description = document.querySelector('#smart-button-container #description');
                    var amount = document.querySelector('#smart-button-container #amount');
                    var descriptionError = document.querySelector('#smart-button-container #descriptionError');
                    var priceError = document.querySelector('#smart-button-container #priceLabelError');
                    var invoiceid = document.querySelector('#smart-button-container #invoiceid');
                    var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
                    var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

                    var elArr = [description, amount];

                    if (invoiceidDiv.firstChild.innerHTML.length > 1) {
                    invoiceidDiv.style.display = "block";
                    }

                    var purchase_units = [];
                    purchase_units[0] = {};
                    purchase_units[0].amount = {};

                    function validate(event) {
                    return event.value.length > 0;
                    }

                    paypal.Buttons({
                    style: {
                        color: 'gold',
                        shape: 'rect',
                        label: 'paypal',
                        layout: 'vertical',
                        
                    },

                    onInit: function (data, actions) {
                        actions.disable();

                        if(invoiceidDiv.style.display === "block") {
                        elArr.push(invoiceid);
                        }

                        elArr.forEach(function (item) {
                        item.addEventListener('keyup', function (event) {
                            var result = elArr.every(validate);
                            if (result) {
                            actions.enable();
                            } else {
                            actions.disable();
                            }
                        });
                        });
                    },

                    onClick: function () {
                        if (description.value.length < 1) {
                        descriptionError.style.visibility = "visible";
                        } else {
                        descriptionError.style.visibility = "hidden";
                        }

                        if (amount.value.length < 1) {
                        priceError.style.visibility = "visible";
                        } else {
                        priceError.style.visibility = "hidden";
                        }

                        if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
                        invoiceidError.style.visibility = "visible";
                        } else {
                        invoiceidError.style.visibility = "hidden";
                        }

                        purchase_units[0].description = description.value;
                        purchase_units[0].amount.value = amount.value;

                        if(invoiceid.value !== '') {
                        purchase_units[0].invoice_id = invoiceid.value;
                        }
                    },

                    createOrder: function (data, actions) {
                        return actions.order.create({
                        purchase_units: purchase_units,
                        });
                    },

                    onApprove: function (data, actions) {
                        return actions.order.capture().then(function (details) {
                            alert('Transaction completed by ' + details.payer.name.given_name + '!');
                            let jsonInfos = {"Descricao":details.purchase_units[0].description,"amountToAdd":details.purchase_units[0].amount.value};
                            console.log(jsonInfos);
                            var data = new FormData();
                            data.append( "json", JSON.stringify( jsonInfos ) );
                            //$.post( '/senhorio/wallet/add', data ); 
                            return fetch('/walletAddInteressado/2', {
                                method: 'POST',
                                headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                                },                                
                                body: JSON.stringify( jsonInfos)                                
                            }).then(function(res) {
                                if (!res.ok) {
                                alert('Something went wrong');
                                }
                            });
                        });
                    },

                    onError: function (err) {
                        console.log(err);
                    }
                    }).render('#paypal-button-container');
                }
                initPayPalButton();
                </script>
</body>
