<h1 class="subhead">Buy Stock</h1>
<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" placeholder="Enter Stock Symbol" type="text"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="shares" placeholder="Number of Shares" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Buy</button>
        </div>
    </fieldset>
</form>
<div class="formmsg">
    <a href="index.php">Back To Portfolio</a>
</div>
