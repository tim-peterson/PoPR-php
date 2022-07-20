

@section('scripts-footer')


  <script src="https://checkout.stripe.com/checkout.js"></script>
  <!--script src="/js/vue-spinner.min.js"></script-->

  <!--script src="/js/stripe_checkout.js"></script-->

  <script>

  $( document ).ready(function() {

  var handler = StripeCheckout.configure({
    key: '{{ env("STRIPE_KEY") }}',  //'pk_test_hM9DR0mCQLlFFzaoZlTqZ7nq',
    image: 'https://trprize.org/TRPrize-logo-gray.png',
    //color: 'black',
    locale: 'auto',
    token: function(token) {
      // You can access the token ID with `token.id`.
      // Get the token ID to your server-side code for use.
      console.log(token);
     
     var $form = $("#create-subscription");

     $form.find($("input[name=email").val(token.email) );
     $form.find($("input[name=stripe_token").val(token.id) );
     $form.find($("input[name=name").val(token.email) );

     //form.submit();


      /*if(typeof token.bitcoin !='undefined' && token.bitcoin.length > 0){

        stripe.createSource({
          type: 'bitcoin',
          amount: 1000,
          currency: 'usd',
          owner: {
            email: 'jenny.rosen@example.com',
          },
        }).then(function(result) {
          // handle result.error or result.source
        });

      }*/

      $.ajax({
        url : '/subscriptions',
        method : 'post',
        beforeSend: function(before){
            $form.html("<h4 style='padding-top:3rem' class='m-t-lg'>Processing... Please wait.</h4>");
        },
        data : { 
          "_token": "{{ csrf_token() }}",
          stripe_token : token.id,
          email : token.email,
          name: token.email,
          card: token.card,
          amount: $("#donate_amount").val(),
          one_time_charge: $("#one_time_charge").val(),
          bitcoin : (typeof token.bitcoin !='undefined' && token.bitcoin.length > 0) ? "1" : "0"
         },
         error: function(jqXHR, textStatus, errorThrown){
          console.log(errorThrown);
          console.log(textStatus);
          $form.html("<h4 style='padding-top:3rem' class='m-t-lg'>Something went wrong. Please contact support@trprize.org.</h4>").css("color", 'red');
         },
         success: function(response){
          $form.html("<h4 style='padding-top:3rem' class='m-t-lg'>Thank you for funding great science. Please email support@trprize.org if you have any questions.</h4>").css("color", 'green');
         }
      });
    }
  });

  $(document.body).on('click', '#customButton', function(e){

    // Open Checkout with further options:
    handler.open({
      name: 'TR Prize',
      description: 'Fund research',
      //zipCode: true,
      amount: parseInt($("#donate_amount").val()), //2000,
      //bitcoin: true,
      panelLabel: "Donate " 
    });
    e.preventDefault();

  }).on('click', '.stripe-checkout-modal-init', function () {

    if($(this).hasClass("btn-lg btn-primary")){
      console.log($(this).find('input').val());
      $("#donate_amount").val($(this).find('input').val()); 

      $("#one_time_charge").val('0');
    }
    else{

        if($('#exampleInputAmount1').val()==''){
          $('#exampleInputAmount1').after("<p style='margin-bottom: 0.5rem;' class='alert alert-danger'>Please give an amount.</p>")
        }
        else if($('#exampleInputAmount1').val() > 0){
          $("#donate_amount").val($('#exampleInputAmount1').val()*100);  
          $("#one_time_charge").val('1');
        }
    }

    if($("#donate_amount").val() > 0) $("#customButton").click();
      //$(this).button('complete') // button text will be "finished!"
  });


  /*document.getElementById('customButton').addEventListener('click', function(e) {
    // Open Checkout with further options:
    handler.open({
      name: 'TR Prize',
      description: 'Fund research',
      //zipCode: true,
      amount: 2000,
      bitcoin: true
    });
    e.preventDefault();
  });*/

  // Close Checkout on page navigation:
  window.addEventListener('popstate', function() {
    handler.close();
  });

    
  });
  </script>
@endsection