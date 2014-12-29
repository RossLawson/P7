<?php

    //config
    require("../includes/config.php");
    
    //if sell form submitted  
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //test: check for empty fields
        if(empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("Error. Incomplete form.");
        }

        //convert symbol to upper
        $_POST["symbol"] = strtoupper($_POST["symbol"]);
        
        /*TOTAL SHARES OWNED (FOR SYMBOL)*/
        $shares_owned = query("SELECT shares FROM portfolio WHERE id = ? and symbol = ?",$_SESSION["id"],$_POST["symbol"]);           
        $no_of_shares_owned = $shares_owned[0]["shares"];
        
        //test: if they own the stock (ie, there is a row for the symbol)
        if (count($shares_owned) == 1)
        {
            //then get share information    
            
            /* STOCK */       
            $stock = lookup($_POST["symbol"]);   
                 
            //test: check y.finance returns a value (ie, company shares are still actively traded)
            if ($stock === false)
            {
                //if false, apologize
                apologize("Shares no longer exist on public markets.");
            }    
                
            //check user is not trying to sell more shares than they own.
            if ($_POST["shares"] > $no_of_shares_owned)
            {
                apologize("You are trying to sell more shares than you own.");    
            }
            else
                /** sell the stock! **/
            {    
                //calculate current value of total held position    
                $stockvalue = $stock["price"]*$no_of_shares_owned;
                
                //calculate value of shares to be sold
                $sellvalue = $stock["price"]*$_POST["shares"];
                
                //check current cash balance
                $balance = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
                
                /** UPDATE TABLES **/
   
                //Update portfolio table
                query("UPDATE portfolio SET shares = shares - ? WHERE id = ? AND symbol = ?",$_POST["shares"],$_SESSION["id"],$_POST["symbol"]);
                //Update history table 
                query("INSERT INTO history (id, time, action, symbol, shares, price) VALUES (?,NOW(),'SELL',?,?,?)", $_SESSION["id"], $_POST["symbol"], $_POST["shares"], $stock["price"]);
                //Update users table (adjust balance)
                query("UPDATE users SET cash = cash + $sellvalue WHERE id = ?", $_SESSION["id"]);
           
                //Delete rows from portfolio if holding = 0
                query("DELETE FROM portfolio WHERE id = ? AND symbol = ? AND shares = 0",$_SESSION["id"],$_POST["symbol"]);
                   
                //confirm sell complete
                render("sell_confirmation.php",["title"=>"Sell"]);
            }
        }
        else
        {
            apologize("Error. Cannot sell stock you do not own.");
        }
    }
    else
    {
        render("sell_form.php",["title"=>"Sell"]);
    }
?>
