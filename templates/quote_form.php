<!--
HTML form via which a user can submit a stock’s symbol,
-->
<h1 class="subhead">Stock Quote</h1>
<form action="quote.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" type="text" name="ticker" placeholder="Enter Stock Ticker"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Search</button>
        </div>
    </fieldset>
</form>
<div class="formmsg">
    <a href="index.php">Back To Portfolio</a>
</div>
