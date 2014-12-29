<?php

// configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //test: check for lack of input
        if (empty($_POST["ticker"]))
        {
            apologize("You must provide a symbol.");
        }
        
        //call lookup() to query yahoo finance
        $ticker = lookup($_POST["ticker"]); 
        
        //test: stock symbol not found
        if($ticker === false)
        {
            apologize("Ticker not found.");
        }
        else //render found results
        {
            render("quote_results.php",[
            "title"=>"Quote", 
            "symbol"=>$ticker["symbol"],
            "name"=>$ticker["name"],
            "price"=>$ticker["price"]
            ]);
        }
    }
    else
    {
        //render quote search form
        render("quote_form.php", ["title" => "Quote"]);
    }      
?>
