{{--
@extends('layout.Master')

@section('extra-js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe=Stripe('pk_test_51Kp5tJGRaOhIEKLtSfp9Y5higTtJ6JZy99douU4Zi8Ag96nG51gnuidL5yTCLvZMeKjfVT5df6Stl07pfhw4aPuN00J1hZU3Bo');
        const btn=document.getElementById("checkout-button");
        btn.addEventListener('click',function()
          {
             e.preventDefault();
             stripe.redirectToCheckout({
                sessionId: "<?php echo $session->id; ?>"
             })
          })
    </script>
@endsection




  --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Stripe Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    @php
        $stripe_key = 'pk_test_51Kp5tJGRaOhIEKLtSfp9Y5higTtJ6JZy99douU4Zi8Ag96nG51gnuidL5yTCLvZMeKjfVT5df6Stl07pfhw4aPuN00J1hZU3Bo';
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <p>Your Total Amount is {{ Cart::total() }} XAF</p>
                </div>
                <div class="card">
                    <form action="{{ route('checkout.afterPayment') }}" method="post" id="payment-form">
                        @csrf
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    ENTREZ LES INFORMATIONS DE VOTRE CARTE DE CREDIT
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="card-button" class="btn btn-dark" type="submit"
                                data-secret="{{ $intent->client_secret }}"> Pay </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        const stripe = Stripe('{{ $stripe_key }}', {
            locale: 'en'
        }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', {
            style: style
        }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            form.disabled = true;
            stripe.handleCardPayment(clientSecret, cardElement, {
                    payment_method_data: {
                        //billing_details: { name: cardHolderName.value }
                    }
                })
                .then(function(result) {
                    var paymentIntent = result.paymentIntent;
                    //   console.log(result);
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        form.disabled = false;
                    } else {



                        form.submit();

                        // console.log(paymentIntent)
                        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        // var form=document.getElementById('payment-form');
                        var url = form.action;
                        fetch(
                            url, {
                                headers: {
                                    'Content-Type': "application/json",
                                    "accept": "application/json, text-plain, */*",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-TOKEN": token
                                },
                                method: 'post',
                                body: JSON.stringify({
                                    paymentIntent: paymentIntent
                                })
                            }
                        ).then((data) => {
                            console.log(data);
                            // console.log(data)
                            // window.log()
                        })




                    }
                });
        });
    </script>
</body>

</html>
