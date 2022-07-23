
@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-md-8 offset-md-2">

  @include('pages._welcome')

<h4 style="margin:3rem 0 0.5rem;">FAQ</h4>
<ul class="list-group" style="list-style: none;" >

<li class="list-group-item">
    <h4 class="list-group-item-heading">Where does the research come from posted on the PoP Review homepage? </h4>
    <p class="list-group-item-text">The research is posted from the researchers themselves. We especially want people to link to their research on the preprint servers, Biorxiv, MedRxiv, and Arxiv. These "Rxiv" websites are <a target="_blank" style="text-decoration: underline;" href="https://en.wikipedia.org/wiki/Preprint">"preprint servers"</a> that enable anyone to submit their research in the STEM (science, technology, engineering, medicine) disciplines for free. This is helpful because not every can afford to publish in traditional academic journals. Currently, we are focusing on biology-related manuscripts (e.g., Arxiv "q-bio" and "physics.bio-ph") but we will expand soon. </p>

</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">How do reviewers get paid to review on PoP Review? </h4>
    <p class="list-group-item-text">

 Two ways. Researchers who submit their work can either agree to pay to have their work reviewed or can see if someone will do it for free. The advantage of the paid approach is that PoP Review will guarantee three (3) independent reviews in two weeks or less. The cost for the paid service is $250 for the three reviews. Those reviewers who review research where the researchers don't pay are eligible to receive donations.  Please donate <a href="/donate"><u>here</u></a>.

    </p>


    <p>We support digital currency donations: </p>
      <ul>
        <li>Bitcoin (BTC): <span class="pe-2" id="BTC-to-clipboard">36DkutW1QKHSiN9xuGakQaaKThWrhTBBRH</span><a class="btn btn-primary submenu mb-1">Copy</a></li>
        <li>Ethereum (ETH): <span class="pe-2" id="ETH-to-clipboard">0xA1d8646345192c00F46E3B427a3c30E9754F1353</span><a class="btn btn-primary submenu mb-1">Copy</a></li>
        <li>USD Coin (USDC): <span class="pe-2" id="USDC-to-clipboard">0xE51181F9af15da4971F13474C2c31A54f7A7bC2E</span><a class="btn btn-primary submenu mb-1">Copy</a></li>
      </ul>

        <script>

        var submenus = document.getElementsByClassName("submenu");
        for (var i = 0; i < submenus.length; i++) {
            submenus[i].onclick = function() {
                var copyText = this.previousSibling.innerText;

                navigator.clipboard.writeText(copyText).then(() => {
                // Alert the user that the action took place.
                // Nobody likes hidden stuff being done under the hood!
                alert("Copied to clipboard: " + copyText);
            });
                return false;
            }
        }
        /*function copyToClipboard() {
            var copyText = this.previousSibling.innerText;
            navigator.clipboard.writeText(copyText).then(() => {
                // Alert the user that the action took place.
                // Nobody likes hidden stuff being done under the hood!
                alert("Copied to clipboard" + copyText);
            });
        }*/
        </script>


</li>




<li class="list-group-item">
    <h4 class="list-group-item-heading">How does peer review work on PoP Review and how does it differ from traditional peer review? </h4>
    <p class="list-group-item-text">  PoP Review reviewing involves ranking each work like it's done with <a style="text-decoration: underline;" target="_blank"  href="https://grants.nih.gov/grants/peer/guidelines_general/scoring_guidance_research.pdf">NIH grants</a>. PoP Review reviews are based on the approach, innovation, and significance. Anyone can review a work by clicking "Write review" under each manuscript. In the future, we will consider enabling researchers control over who reviews their work.

    <br><br>
    Regarding the review mechanics, we have it set up like granting agencies do where the authors can get feedback and do with the comments what they like but there isn’t a back and forth. We thought this was a unique angle that would be complementary to the preprint servers and help researchers improve the work for whatever path they take with the work.
   <br><br>
    We believe PoP Review reviews have value when compared to traditional reviews because they can be fast (two weeks or less) and can acheive a broad consensus. Traditionally, peer review is performed by a relative small number of people (2-4) over many months if not years. </p>
</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">Why use the NIH criteria for peer review? In particular, why include rating manuscripts based on the "investigator" and "environment"?</h4>
    <p class="list-group-item-text"> We're starting with the NIH grant criteria because it's familiar and because it gives a cue to the donors that their money is needed and will go to good use.

    <br><br>
    Considering this, we see "Investigator" and "Environment" as being strengths for less established labs. We'd like reviewers to consider young investigators as people with potential. Likewise a well-funded lab might get a weak investigator score because they wouldn't be in as great of a peer review.

    <br><br>
    We are always open to suggestions on the criteria we enable for PoP Review peer reviewers.

    </p>
</li>


<li class="list-group-item">
    <h4 class="list-group-item-heading">How are donations handled?</h4>
    <p class="list-group-item-text">
    PoP Review is a 501(c)(3) registered non-profit organization that gives the donations we receive to the researchers who review unpaid peer reviews. A small fraction of the donations go to operating the PoP Review organization, as is needed to pay staff salaries and maintain this website.  We contact awarded researchers based on their contact information they include with their manuscripts. We use <a style="text-decoration: underline;" target="_blank" href="https://stripe.com">Stripe</a> for our credit card processing and <a style="text-decoration: underline;" target="_blank" href="https://coinbase.com">Coinbase</a> for our cryptocurrencies.</p>

</li>



<li class="list-group-item">
    <h4 class="list-group-item-heading">Can you log in under a pseudonym? Can people see my activity on the site? </h4>
    <p class="list-group-item-text"> Yes, you can log in under a pseudonym. There's no restrictions on who can use the site. Your reviews and donations are private. If you will make a donation or pay for a review using a credit card, we are required by our payment processor to collect your email. </p>
</li>


<li class="list-group-item">
    <h4 class="list-group-item-heading">How much does it cost to publish academic work in general? </h4>
    <p class="list-group-item-text">The amounts charged by for-profit (and non-profit) publishers varies widely, but in the biological sciences the cost can be $1000-$5000. Preprint servers are free to publish. We think they are a great option.</p>

</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">How can I help increase the pace of research? </h4>
    <p class="list-group-item-text">Facilitating peer review is one of the incentives we are targeting here with PoP Review. Academics struggle to get their research reviewed, which stalls their ability to publish papers needed to get funding. Early career investigators face particularly steep challenges to compete financially and reputationally with more established researchers. We hope PoP Review can provide some financial support. We additionally aim to improve the pace by having fast peer reviews in sync with the one-month funding cycles. </p>

</li>

<li class="list-group-item">
    <h4 class="list-group-item-heading">Is academic work not publicly available?</h4>
    <p class="list-group-item-text">Yes and No. In the US, despite research being largely funded by the public, the publishers of research are allowed by the government, i.e., NIH, to have a six month time-period to profit off of exclusive access to newly published work. Similarly, many journals don't have their back catalogs publicly accessible. </p>
</li>



<li class="list-group-item">
    <h4 class="list-group-item-heading">Who developed PoP Review? And what does PoP Review refer to?</h4>
    <p class="list-group-item-text">
    PoP Review was created by <a style="text-decoration: underline;" target="_blank" href="https://www.linkedin.com/in/petersontimr">Tim R Peterson</a> and colleagues. PoP Review is an acronym that stands for Proof of Peer Review. Tim is an Assistant Professor at Washington University School of Medicine. The PoP Review is not affiliated with Washington University. </p>

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
