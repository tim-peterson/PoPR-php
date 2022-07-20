
<p>Hi there,</p>

<p> The TR Prize awardees for last month are: </p>

<ul>


    @foreach($prize_winners as $winner)
    		

    	

    		<li><b>Average score:</b> {{ round($winner->avg_score, 2) }}; <b>Prize amount:</b> ${{ round($winner->prize_winners, 0) }}; <b>Title:</b> {{ $winner->name }} </li>

    @endforeach

</ul>

<p>Congratulations to the Awardees!</p>




<p><div> Best regards,</div> 

<div> The TR Prize</div> </p>