@extends('layouts.app')


@section('content')



<div class="row">
    <div class="col-md-6 offset-md-3">
        <p class="mb-3 mt-3 darker-gray-txt"> Login</p>
    </div>
</div>
<div class="row">
<div class="col-md-4 offset-md-4">



    <form method="POST" action="{{ route('payments.purchase', $project->id) }}" class="card-form mt-3 mb-3">
        @csrf
        <input type="hidden" name="payment_method" class="payment-method">
        <input class="StripeElement mb-3" name="card_holder_name" placeholder="Card holder name" required>
        <div class="col-lg-4 col-md-6">
            <div id="card-element"></div>
        </div>
        <div id="card-errors" role="alert"></div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary pay">
                Purchase
            </button>
        </div>
    </form>





            <form action="{{url('update-cc')}}" method="POST" id="updateCCForm" class="form-horizontal">
                {{ csrf_field() }}

                <div class="row mb-3">

                    <label for="inputEmail" class="col-sm-3 col-form-label">Card</label>

                    <div id="card-element" class="col-sm-9"></div>

                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Exp/CVC</label>
                    <div class="col-sm-9"></div>


                </div>
                <div class="row mb-3">
                    <div class="offset-sm-3">
                        <button id="card-button" type="submit" class="btn btn-primary" data-secret="{{ $intent->client_secret }}">
                            Update Payment Method
                        </button>

                    </div>
                </div>

            </form>







            <script src="https://js.stripe.com/v3/"></script>

            <script>
                const stripe = Stripe('{{ env("STRIPE_KEY") }}');

                const elements = stripe.elements();
                const cardElement = elements.create('card');

                cardElement.mount('#card-element');

                const cardHolderName = document.getElementById('card-holder-name');

                const cardButton = document.getElementById('card-button');
                const clientSecret = cardButton.dataset.secret;

                cardButton.addEventListener('click', async (e) => {
                    const { setupIntent, error } = await stripe.confirmCardSetup(
                        clientSecret, {
                            payment_method: {
                                card: cardElement,
                                billing_details: { name: cardHolderName.value }
                            }
                        }
                    );

                    if (error) {
                        // Display "error.message" to the user...
                    } else {
                        // The card has been verified successfully...
                    }
                });
            </script>



</div>
</div>



@stop
