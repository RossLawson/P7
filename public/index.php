<?php
    // configuration
    require("../includes/config.php"); 
    
    //Query database for users current positions
    $rows = query("SELECT symbol, shares FROM portfolio WHERE id = ?", $_SESSION["id"]);     
    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);  
    
    //Instantiate portfolio
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"]
            ];
        }
    }
    render("portfolio.php", ["title"=>"Portfolio", "positions" => $positions, "cash" => $cash]); 
?>


