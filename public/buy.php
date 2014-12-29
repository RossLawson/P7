<?php

    //config
    require("../includes/config.php");
    
    //if buy_form submitted
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        //test: for empty symbol
        if(empty($_POST["symbol"])||empty($_POST["shares"]))
        {
            apologize("You missed a field! Please retry.");
        }
        
        //convert symbol to upper
        $_POST["symbol"] = strtoupper($_POST["symbol"]);
        
        //test: check for valid symbol
        $stock = lookup($_POST["symbol"]);
        if ($stock === false)
        {
            apologize("Error. Invalid symbol.");
        }
        
        //test: check to see if user has enough available funds to purchase shares
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);        
        $cash = $cash[0]["cash"];
        
        $stockorder = $stock["price"]*$_POST["shares"];
        
        if($stockorder > $cash)
        {
            apologize("You do not have enough available funds for this order.");
        }    
        else        
        //execute order, 'purchase' stock, update portfolio fields
        {   
            //Update portfolio table
            query("INSERT INTO portfolio (id,symbol,shares) VALUES(?,?,?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)",$_SESSION["id"],$_POST["symbol"],$_POST["shares"]);
            //Update history table 
            query("INSERT INTO history (id, time, action, symbol, shares, price) VALUES (?,NOW(),'BUY',?,?,?)",  $_SESSION["id"], $_POST["symbol"], $_POST["shares"], $stock["price"]);
            //Update users table (adjust balance)
            query("UPDATE users SET cash = cash - $stockorder WHERE id = ?",$_SESSION["id"]);
            
            render("buy_confirmation.php",["title"=>"Order executed. Purchase confirmed! The stock has now been added to your portfolio."]);
        }
     }
     else
     {
        render("buy_form.php",["title"=>"Buy"]);
     }   
?>
