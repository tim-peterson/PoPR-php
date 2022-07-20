

<form id="create-subscription" method="POST" action="/subscriptions">

    @if(strpos(Request::url(), 'donate'))
      <p class="title m-b-lg">The TR Prize are monthly awards for the best, original academic research. Please see the <a href="/about"><u>about</u></a> page for more details. To fund research under consideration for a TR Prize, please choose to donate one-time or monthly. 
        
 {{--                   <span class="navbar-link">Donated this month <b>${{ \Cache::get('donations_this_month')/100 }}</b></span>
  --}}
        
      </p>
    @endif
    
    <input hidden type="text" name="_token" value="{{ csrf_token() }}">

    <input hidden type="text" name="one_time_charge" id="one_time_charge" value="">

    <input type="hidden" id="donate_amount" name="amount" value="" required>

    <div class="text-center">

      <div class="col-md-2 col-md-offset-3 ">
        <h4 class=""> One time donation</h4>

        <div class="form-group">
          <label for="exampleInputAmount1">Amount ($)</label>
          <input type="number" class="form-control form-control-lg" required id="exampleInputAmount1" placeholder="amount">
        </div>
        <div class="form-group">
          <button class="one-time-btn btn btn-primary stripe-checkout-modal-init" type="button">Continue</button>
        </div>

      </div>

      @if(strpos(Request::url(), 'donate'))
          @include('pages._subscribe_monthly')
      @endif

  </div>
  <input hidden type="email" name="email" value="" required>
  <input hidden type="text"  name="name" value="" required>
  <input hidden type="text"  name="stripe_token" value="" required>

  <button hidden type="submit" value="Submit">Submit</button> 

  <div class="m-t-lg col-md-12">

        <p class="m-t-lg">We also support digital currency donations: 
        <ul>
          <li>Bitcoin: 13jQwuwuZ1MkQwjW9ger64MgRvwYMWdVGs</li>
          <li>Ethereum: 0x0aA00bdE6410558EcC58466c3f9b8016a670b863</li>
          <li>Litecoin: LVqTbheC5kAQ9R5ExnCmuEURoLcgUbLQYV</li>
          <li>Bitcoin Cash: 19Rv5TE7QUWU6kiFvWh9rZNkYP1fNbbuLu</li>
        </ul>
      </p>
  </div> 

</form>

<button hidden id="customButton">Purchase</button>




