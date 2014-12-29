<h1 class="subhead">Order History</h1>
<div class="row">
    <div class="col-md-4"></div>
        <div class="col-md-4">
            <table class="table table-condensed table-hover row">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Action</th>
                        <th>Symbol</th>
                        <th>Shares</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody class="tablebody">
                    <?php foreach($rows as $row): ?>
                        <tr>
                            <td><?= $row["time"] ?></td>
                            <td><?= $row["action"] ?></td>
                            <td><?= $row["symbol"] ?></td>
                            <td><?= number_format($row["shares"]) ?></td>
                            <td>$<?= number_format($row["price"],2,'.',',') ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>  
           </table>       
        </div>
</div>           
<div class="formmsg">
    <a href="index.php">Back To Portfolio</a>
</div>
           
           
           
           
