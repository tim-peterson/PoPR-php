@extends('spark::layouts.app')

@section('content')



<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">

  @include('pages._welcome')

<h4 style="margin:2rem 0;">FAQ</h4>
<ul class="list-group" style="list-style: none;" >

<li> <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">How does publishing and funding work on The TR Prize? </h4>
    <p class="list-group-item-text">Publishing works on monthly cycles. All work submitted during a given month must be reviewed during that month. At the end of the month, the top three manuscripts as determined by peer reviews will receive a TR Prize. The prize amounts will be determined by how many people support TR. You can support research on TR with $1, $10, $100, $1000 monthly donations. </p>
  </a></li>

<li> <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">How much does it cost to publish academic work on TR and in general? </h4>
    <p class="list-group-item-text">The amounts charged by publishers varies widely, but in the biological sciences the cost can be $1000-$5000. TR is free to publish. We are exploring paid options that allow authors to reach more reviewers and get their published work be seen more.</p>
  </a></li>

<li> <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">How can I help increase the pace of research? </h4>
    <p class="list-group-item-text">Funding is one of the incentive we are targeting here with The TR Prize. Academics struggle to fund their research as government budgets stall. We hope the TR Prize can provide some financial support. We additionally aim to improve the pace by having decisions be made on manuscripts within a one-month time frame. </p>
  </a></li>

<li> <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">How does peer review work on TR and how does it differ from traditional peer review? </h4>
    <p class="list-group-item-text"> Upon submitting your manuscript, we analyze the internet to find 100 qualified peer reviewers. The reviewers rank each work based on the originality, rigor, and impact of the work. Additionally, the reviewer must chose to accept or reject the manuscript for publication. Each manuscript must be accepted by greater than 50% of reviewers, with a minimum number of 10 reviewers.
   <br><br>
    Peer review is traditionally performed anonymously by 2-4 people in the field over months if not years. Many academics complain that reviewer anonymity licenses the reviewers to be unfair to the authors. Also 2-4 critiques often don't provide a broad enough opinion on the acceptablility of the manuscript for publication. Lastly, the process could be speeded up with built in time-incentives such as those provide here.  </p>
  </a></li>

<li> <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Is academic work not publicly available?</h4>
    <p class="list-group-item-text">Here in the US, despite research being largely funded by the public, the publishers of research are allowed by the government, i.e., NIH, to have a six month time-period to profit off of exclusive access to the work.</p>
  </a></li>

<li> <a target="_blank" href="https://www.linkedin.com/in/petersontimr" class="list-group-item">
    <h4 class="list-group-item-heading">Who developed this website?</h4>
    <p class="list-group-item-text">
    Tim Peterson created TR. He is an Assistant Professor at Washington University School of Medicine.  </p>
  </a></li>

</ul>



</div>
</div>
</div>
@endsection
