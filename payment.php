<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Options</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
         ::-webkit-scrollbar {
            width: 8px;
        }
        /* Track */
        
         ::-webkit-scrollbar-track {
            background: darkviolet;
        }
        /* Handle */
        
         ::-webkit-scrollbar-thumb {
            background: #888;
        }
        /* Handle on hover */
        
         ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        
        body {
            background: darkviolet
        }
        
        .rounded {
            border-radius: 1rem
        }
        
        .nav-pills .nav-link {
            color: #555
        }
        
        .nav-pills .nav-link.active {
            color: white
        }
        
        input[type="radio"] {
            margin-right: 5px
        }
        
        .bold {
            font-weight: bold
        }
        
        .display-6 {
            color: whitesmoke;
        }
        
        body {
            font-family: 'Varela Round', sans-serif;
            background: darkviolet;
        }
        
        .modal-confirm {
            color: #636363;
            width: 325px;
            font-size: 14px;
        }
        
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }
        #ok{
            background-color: darkviolet;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }
        
        .modal-confirm .form-control,
        .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }
        
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }
        
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
        }
        
        .modal-confirm .icon-box {
            color: #fff;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: darkviolet;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }
        
        .modal-confirm .icon-box i {
            font-size: 58px;
            position: relative;
            top: 3px;
        }
        
        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }
        
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: darkviolet;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }
        
        .modal-confirm .btn:hover,
        .modal-confirm .btn:focus {
            background: darkviolet;
            outline: none;
        }
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: darkviolet;
}
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
        
	.about-btnn {
		font-family: "Raleway", sans-serif;
		font-weight: 500;
		font-size: 14px;
		letter-spacing: 1px;
		display: inline-block;
		padding: 12px 32px;
		border-radius: 0px;
		transition: 0.5s;
		line-height: 1;
		margin: 10px;
		/* color: #fff; */
		-webkit-animation-delay: 0.8s;
		animation-delay: 0.8s;
		border: 2px solid darkviolet;
		background: darkviolet;
		color: white ;
		text-decoration: none;
        width: 100%;
	}

	.about-btnn:hover {
		background: none;
		color: black;

	}
    </style>
</head>

<body classname="snippet-body" data-new-gr-c-s-check-loaded="14.1058.0" data-gr-ext-installed="">
    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Payment Method</h1>
            </div>
        </div>
        <!-- End -->
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2"id="ok">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3" >
                                <li class="nav-item">
                                    <a data-toggle="pill" href="#credit-card" class="nav-link"> <buton  class="about-btnn"> <i class="fas fa-credit-card mr-2"></i>Credit Card </button></a>
                            </ul>
                        </div>
                        <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade pt-3">
                                <form role="form" onsubmit="event.preventDefault()">
                                    <div class="form-group"> <label for="username">
                                            <h6>Card Owner</h6>
                                        </label> <input type="text" name="username" placeholder="Card Owner Name" required="" class="form-control "> </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required="">
                                            <div class="input-group-append"> <span class="input-group-text text-muted">
                                                    <i class="fab fa-cc-visa mx-1"></i> <i
                                                        class="fab fa-cc-mastercard mx-1"></i> <i
                                                        class="fab fa-cc-amex mx-1"></i> </span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required="" pattern="{0,2}"> <input type="number" placeholder="YY" name="" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="" data-original-title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text" required="" class="form-control"> </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <!-- <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button> -->
                                        <button href="#myModal"  class="subscribe btn btn-primary btn-block shadow-sm" id="ok"data-toggle="modal">Confirm Payment</button>
                                    </div>
                                </form>
                            </div>
                            <div class="text-center">
                                <!-- Button HTML (to Trigger Modal) -->
                            </div>
                            <!-- Modal HTML -->
                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog modal-confirm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="icon-box">
                                                <i class="material-icons">&#xE876;</i>
                                            </div>
                                            <h4 class="modal-title w-100">Awesome!</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">Payment successfull.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                        </div>
                        <!-- End -->
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    </div>
    </div>
</body>

</html>