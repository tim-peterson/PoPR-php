
<div style="min-height:320px"></div>

<footer :user="user" inline-template>

<footer class="container" >
  <div class="row">


      <div class="col-md-8">
        <a href="/terms">Terms of Service</a> | <a href="/about">About</a> | <a @click.prevent="showSupportForm" style="cursor: pointer;"><i class="fa fa-fw fa-btn fa-paper-plane"></i>Contact us</a>
      </div>
      <div class="col-md-4">
        <p class="muted pull-right">© {{ date("Y").' '.config('app.name') }}. All rights reserved.</p>
      </div>

  </div>
</footer>

</footerr>
