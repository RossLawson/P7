<!DOCTYPE html>
<html>
    <head>
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>
        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>
        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <nav>
            <h2 id="cs50"><a href="/">#CS50<strong>FINANCE</strong> </a></h2>
        </nav>
        <div class="container">
            <div id="top">
                <br/>
                    <a href="/index.php"><div class="navbox">Home</div></a>
                    <a href="/buy.php"><div class="navbox">Buy</div></a>
                    <a href="/sell.php"><div class="navbox">Sell</div></a>
                    <a href="/quote.php"><div class="navbox">Quote</div></a>
                    <a href="/history.php"><div class="navbox">History</div></a>
                    <a href="/passchange.php"><div class="navbox">Password</div></a>
                    <a href="/logout.php"><div class="navbox">Logout</div></a>
                <br/>
            </div>
            <div id="middle">
