<!DOCTYPE html>
<html>

<head>
    <title> Razorpay Payment Gateway Integration Example </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>

    <div class="container">

        <h1 class="text-center"> Razorpay Subscription Plan Integration </h1>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary credit-card-box">
                    <div class="panel-heading display-table">
                        <h3 class="panel-title ">Razorpay Subscription Plan Integration </h3>
                    </div>
                    <div class="panel-body">

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif


                        <form class="contribution-form" id="contribution-form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" class="form-control" placeholder="Amount" name="amount">

                            </div>
                            <div class="form-group">
                                <label>Subscription Plan</label>
                                <select class="form-control select3" name="period" id="period">

                                    <option value="daily" selected>Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly" selected>Monthly</option>
                                    <option value="yearly">yearly</option>

                                </select>

                            </div>
                            <div class="form-group">
                                <label>Payment Cycle</label>
                                <select class="form-control select3" name="total_count" id="total_count">


                                    <option value="1" selected>1 time</option>
                                    <option value="2">2 time</option>
                                    <option value="6" selected>6 time</option>

                                </select>

                            </div>
                            <button class="btn btn-primary" type="submit">Checkout</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <form class="contribution-form" name="contribution_form" method="POST" enctype="multipart/form-data"
        action="{{ route('payment') }}">
        @csrf
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />

        <input type="hidden" name="razorpay_signature" id="razorpay_signature" />
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- using cdn here  --}}
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).ready(function() {

            $('#contribution-form').submit(function(e) {
                e.preventDefault();
                var form = $('#contribution-form')[0];
                var data = new FormData(form);
                var URL = "{{ route('create') }}";
                $.ajax({
                    url: URL,
                    data: data,
                    type: "POST",
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(dta) {
                        if (dta.status === true) {

                            //alert(dta.url+" subscription url successfully generated");
                            // location.reload();
                            //here we are passing options data from backend 
                            proceedPayment(dta.checkoutData);

                        }
                    },
                    error: function(dta) {
                        //show error message
                        console.log(dta.responseJSON.message);
                    }
                });
            })

        });
        //this function calls when form submited and order id created successfully
        var proceedPayment = function(dta) {
            var options = dta;
            options.handler = function(response) {
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.getElementById('razorpay_signature').value = response.razorpay_signature;
                document.contribution_form.submit();

            }
            Razorpay.open(options);
        }
    </script>

</body>

</html>




{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Subscription - Razorpay Payment Gateway</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">
  
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                        @endif
  
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> {{ $message }}
                            </div>
                        @endif
  
                        <div class="card card-default">
                            <div class="card-header">
                                Subscription - Razorpay Payment Gateway
                            </div>
  
                            <div class="card-body text-center">
                                <form action="{{ route('razorpay.payment.store') }}" method="POST" >
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount="1000"
                                            data-buttontext="Pay 10 INR"
                                            data-name="ItSolutionStuff.com"
                                            data-description="Rozerpay"
                                            data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                                            data-prefill.name="name"
                                            data-prefill.email="email"
                                            data-theme.color="#ff7529">
                                    </script>
                                </form>
                            </div>
                        </div>
  
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> --}}
