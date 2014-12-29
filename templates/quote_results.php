<!--
A stock’s latest price (if passed, via render, an appropriate value)
-->

<h1 class="subhead">Share Price Quote</h1>      
<p>
<strong>Company name: </strong><?=$name?> <br/>
<strong>Ticker: </strong><?=$symbol?> <br/>
<strong>Current price: </strong>$<?=number_format($price, 2)?> <br/>
</p>
<div class="formmsg">
    <a href="index.php">Back To Portfolio</a>
</div>
