
@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">

  @include('pages._welcome')

<h4 style="margin:3rem 0 0.5rem;">FAQ</h4>
<ul class="list-group" style="list-style: none;" >

<li class="list-group-item">
    <h4 class="list-group-item-heading">Where does the research come from posted on the TR Prize homepage? </h4>
    <p class="list-group-item-text">The research up for consideration for a TR Prize comes from Biorxiv and Arxiv. We want people to fund research published on Biorxiv and Arxiv because we want to encourage the dissemination of as much science as possible. Bioxiv and Arxiv are <a target="_blank" style="text-decoration: underline;" href="https://en.wikipedia.org/wiki/Preprint">"preprint servers"</a> that enable anyone to submit their research in the STEM (science, technology, engineering, medicine) disciplines for free. This is helpful because not every can afford to publish in traditional academic journals. Currently, we are focusing on biology-related manuscripts (Biorxiv and Arxiv "q-bio" and "physics.bio-ph") but we will expand soon. </p>

</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">How does funding work on The TR Prize? </h4>
    <p class="list-group-item-text">

The prize amounts will be determined by how many people support the research. We're using a crowdfunding approach, meaning anyone can donate and we’ve installed mechanisms for people to give on the site. Donations can be one-time or monthly. Please donate <a href="/donate"><u>here</u></a>.

    </p>

    <p>We support digital currency donations: </p>
      <ul>
        <li>Bitcoin: 13jQwuwuZ1MkQwjW9ger64MgRvwYMWdVGs</li>
        <li>Ethereum: 0x0aA00bdE6410558EcC58466c3f9b8016a670b863</li>
        <li>Litecoin: LVqTbheC5kAQ9R5ExnCmuEURoLcgUbLQYV</li>
        <li>Bitcoin Cash: 19Rv5TE7QUWU6kiFvWh9rZNkYP1fNbbuLu</li>
      </ul>

<br>

   Funding works on monthly cycles. All work submitted to <a target="_blank" style="text-decoration: underline;" href="http://biorxiv.org">Biorxiv</a> and <a target="_blank" style="text-decoration: underline;" href="http://arxiv.org">Arxiv</a> during a given month must be reviewed by the TR Prize community (that includes you!) during that month. At the end of the month, the top Biorxiv and Arxiv manuscripts as determined by TR Prize community reviews will receive a TR Prize.


</li>


<li class="list-group-item">
    <h4 class="list-group-item-heading">How can I see past winners? </h4>
    <p class="list-group-item-text">  Please see <a style="text-decoration: underline;" target="_blank"  href="/awardees">this page </a>. </p>
</li>


<li class="list-group-item">
    <h4 class="list-group-item-heading">How does peer review work on The TR Prize and how does it differ from traditional peer review? </h4>
    <p class="list-group-item-text">  TR Prize reviewing involves ranking each work like it's done with <a style="text-decoration: underline;" target="_blank"  href="https://grants.nih.gov/grants/peer/guidelines_general/scoring_guidance_research.pdf">NIH grants</a>. TR Prize reviews are based on the approach, innovation, significance, investigator, and environment. Anyone can review a work by clicking "Write review" under each manuscript. In the future, we will consider enabling researchers control over who reviews their work.

    <br><br>
    Regarding the review mechanics, we have it set up like granting agencies do where the authors can get feedback and do with the comments what they like but there isn’t a back and forth. We thought this was a unique angle that would be complementary to the preprint servers and help researchers improve the work for whatever path they take with the work.
   <br><br>
    We believe TR Prize reviews have value when compared to traditional reviews because they are fast (one-month) and can acheive a broad consensus. Traditionally, peer review is performed by a relative small number of people (2-4) over many months if not years. </p>
</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">Why use the NIH criteria for peer review? In particular, why include rating manuscripts based on the "investigator" and "environment"?</h4>
    <p class="list-group-item-text"> We're starting with the NIH grant criteria because it's familiar and because it gives a cue to the donors that their money is needed and will go to good use.

    <br><br>
    Considering this, we see "Investigator" and "Environment" as being strengths for less established labs. We'd like reviewers to consider young investigators as people with potential. Likewise a well-funded lab might get a weak investigator score because they wouldn't be in as great of need for a TR Prize.

    <br><br>
    We are always open to suggestions on the criteria we enable for TR Prize peer reviewers.

    </p>
</li>


<li class="list-group-item">
    <h4 class="list-group-item-heading">How are donations handled?</h4>
    <p class="list-group-item-text">
    The TR Prize is a 501(c)(3) registered non-profit organization that gives the donations we receive to the researchers who are awarded TR Prizes. A small fraction of the donations go to operating the TR Prize organization, as is needed to pay staff salaries and maintain this website.  We contact awarded researchers based on their contact information they include with their manuscripts. We use <a style="text-decoration: underline;" target="_blank" href="https://stripe.com">Stripe</a> for our credit card processing and <a style="text-decoration: underline;" target="_blank" href="https://coinbase.com">Coinbase</a> for our cryptocurrencies.</p>

</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">Who actually gets the TR Prize? First authors or corresponding authors? How can the money be spent?</h4>
    <p class="list-group-item-text">
    The corresponding authors decide. They can divide the money and spend it however they wish. It doesn't have to go to research. We will contact each corresponding author at the email address they provided in the manuscript they submitted to the preprint server they used.</p>

</li>


<li class="list-group-item">
    <h4 class="list-group-item-heading">Are the manuscripts submitted to preprint servers at the end of the month at a disadvantage?</h4>
    <p class="list-group-item-text">
    Yes and No. There is a minimum number of reviews each manuscript must receive in order to be considered for a TR Prize. Therefore, as long as you can obtain this minimum, your manuscript can win. On the other hand, the more reviews a manuscript gets, the better its score. If you are considering submitting your manuscript to Biorxiv/Arxiv late in the month and can wait until the beginning of the next month that will be preferrable. We will re-evaluate our scoring regularly to ensure a fair solution. </p>

</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">Can you log in under a pseudonym? Can people see my activity on the site? </h4>
    <p class="list-group-item-text"> Yes, you can log in under a pseudonym. There's no restrictions on who can use the site. Your reviews and donations are private. </p>
</li>


<li class="list-group-item">
    <h4 class="list-group-item-heading">How much does it cost to publish academic work in general? </h4>
    <p class="list-group-item-text">The amounts charged by for-profit (and non-profit) publishers varies widely, but in the biological sciences the cost can be $1000-$5000. Preprint servers are free to publish. We think they are a great option.</p>

</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">How can I help increase the pace of research? </h4>
    <p class="list-group-item-text">Funding is one of the incentives we are targeting here with The TR Prize. Academics struggle to fund their research as government budgets stall. Early career investigators face particularly steep challenges to compete financially and reputationally with more established researchers. We hope the TR Prize can provide some financial support. We additionally aim to improve the pace by having fast peer reviews in sync with the one-month funding cycles. </p>

</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">Is academic work not publicly available?</h4>
    <p class="list-group-item-text">Yes and No. In the US, despite research being largely funded by the public, the publishers of research are allowed by the government, i.e., NIH, to have a six month time-period to profit off of exclusive access to newly published work. Similarly, many journals don't have their back catalogs publicly accessible. </p>
</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">Does The TR Prize have any relationship with Biorxiv or Arxiv?</h4>
    <p class="list-group-item-text">While we hope The TR PRize promotes the use of preprint servers, we have no formal relationship with them. We obtain the manuscripts we post from publicly available, Biorxiv and Arxiv RSS feeds. </p>
    <ul >
        <li>Biorxiv: <a target="_blank" href="http://connect.biorxiv.org">http://connect.biorxiv.org</a> </li>
        <li> Arxiv: <a target="_blank" href="http://export.arxiv.org">http://export.arxiv.org</a> </li>
    </ul>

</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">Who developed The TR Prize? And what does The TR Prize refer to?</h4>
    <p class="list-group-item-text">
    The TR Prize was created by <a style="text-decoration: underline;" target="_blank" href="https://www.linkedin.com/in/petersontimr">Tim R Peterson</a> and colleagues, so the TR Prize name is a play on Tim's name. Tim is an Assistant Professor at Washington University School of Medicine. The TR Prize is not affiliated with Washington University. </p>

</li>


<li class="list-group-item">
    <h4 class="list-group-item-heading">Questions?</h4>
    <p class="list-group-item-text">
    Please <a href="mailto:support@trprize.org"><u>reach out</u></a>! We'd love to talk with you.
</p>

</li>



</ul>



</div>
</div>
</div>
@stop
