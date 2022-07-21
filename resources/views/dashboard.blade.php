@extends('layouts.app')

<script src="https://js.stripe.com/v3/"></script>
@section('content')

    <div class="row">
        <div class="col-md">



            <h4> Welcome {{  ucfirst(Auth()->user()->name) }} </h4>


            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="projects-tab" data-bs-toggle="tab" data-bs-target="#projects-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Projects</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Reviews</button>
            </li>

            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="projects-tab-pane" role="tabpanel" aria-labelledby="projects-tab" tabindex="0">


                    @if(!empty($projects))


                    <form id="formStripe" action="/charge" method="POST" >
                        {{ csrf_field() }}

                        <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key='{{ env("STRIPE_KEY") }}'
                                data-amount="25000"
                                data-name="Stripe Demo"
                                data-description="Proof of peer review"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto"
                                data-currency="usd">
                        </script>
                        <script>
                            // Hide default stripe button, be careful there if you
                            // have more than 1 button of that class
                            document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';




                        </script>


                        <button type="submit" id="openStripeModalBtn" hidden class="btn">Pay</button>
                    </form>

                        <ul>
                            @foreach($projects as $project)
                            <li> {{$project->title}}

                                @if($project->paid > 0)
                                <small>paid</small>
                                @else
                                    <button data-id="{{ $project->id }}"  class="openStripeModalBtn btn">Pay</button>
                                @endif
                            </li>
                            <script>
                                $(".openStripeModalBtn").on('click', function(){
                                    console.log("hello");
                                    $("#openStripeModalBtn").click();

                                    document.getElementById("formStripe").action = "/charge/" + $(this).data("id");

                                });

                                </script>
                            @endforeach
                        </ul>

                    @endif
                </div>
            <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">

                    @if(!empty($reviews))
                    <ul>
                        @foreach($reviews as $review)
                        <li> {{$review->title}} </li>
                        @endforeach
                    </ul>
                    @endif

                </div>
            </div>

            <p><a class="small" href="{{url('logout')}}">Logout</a></p>

        </div>
    </div>
@stop
