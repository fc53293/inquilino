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
    <script src="/js/scripts.js"></script>
</head>

<body>


    <!-- Profile -->
    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center pt-5 ">
        <div class="container profile-container">
            <div class="wallet-container text-center">
            <p class="page-title"><i class="fa fa-align-left"></i>MyUniRent wallet<i class="fa fa-user"></i></p>
            @foreach ($data as $info)
            
            <div class="amount-box text-center">
                <img src="https://lh3.googleusercontent.com/ohLHGNvMvQjOcmRpL4rjS3YQlcpO0D_80jJpJ-QA7-fQln9p3n7BAnqu3mxQ6kI4Sw" alt="wallet">
                <p>Total Balance</p>
                <p class="amount">{{ $info['Saldo'] }} €</p>
               
            </div>
            
            <div class="btn-group text-center">
                <button type="button" class="btn btn-outline-light" onclick="div_show()">Add Money</button>
                </div>

                <div class="txn-history">
                    <p><b>History</b></p>
                    <p class="txn-list">Payment to xyz shop<span class="debit-amount">-$100</span></p>

                    <p class="txn-list">Payment to abc shop<span class="debit-amount">-$150</span></p>

                    <p class="txn-list">Credit From abc ltd<span class="credit-amount">+$300</span></p>

                    <p class="txn-list">Transfer From John Doe<span class="credit-amount">+$100</span></p>
                </div>

                <div class="footer-menu">
                 
                </div>

                <div id="abc">
                    <!-- Popup Div Starts Here -->
                    <div id="popupContact">
                        <!-- Contact Us Form -->
                        <form action="/walletAdd/{{ $info['Username'] }}" id="form" method="post" name="form">
                            <img id="close" src="/img/closeButton.png" onclick ="div_hide()">
                            <h1>Amount</h1>
                            
                            <input id="name" name="amountToAdd" placeholder="Amount" type="number" require>
                            <br><br><br>

                            <!--<a href="javascript:%20check_empty()" id="submit" >Add</a>-->
                            <button id="submitWallet" type="submit" name="sub" href="javascript:%20check_empty()">Add</button>
                        </form>
                        </div>
                        <!-- Popup Div Ends Here -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- END Profile -->
</body>