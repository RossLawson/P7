<h1 class="subhead">
<?php
    $username = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
    $username = $username[0]["username"];
    echo $username;
?>
's portfolio</h1>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <table class="table table-condensed table-hover row">
        <thead>
            <tr>
                <th>Ticker</th>
                <th>Shares</th>
                <th>Price</th>
                <th>Position Value</th>
            <tr>    
        </thead>
        <tbody>
            <?php foreach ($positions as $position): ?>
                <tr>
                    <td><?= $position["symbol"] ?></td>
                    <td><?= number_format($position["shares"],0,'.',',') ?></td>
                    <td>$<?= number_format($position["price"],2,'.',',') ?></td>
                    <td>$<?= number_format($position["price"]*$position["shares"],2,'.',',') ?></td>
                </tr>
             <?php endforeach ?>
        </tbody>
</table>
<p>Current Balance: $<?php echo number_format($cash[0]["cash"],2,'.',',')?></p>
</div>
