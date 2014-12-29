<?php
    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //test: check if either username or password are empty
        if (empty($_POST["username"]) || empty ($_POST["password"]))
        {
            apologize("You must provide username and password.");
        }
        
        //test: check if password and confirmation match
        else if ($_POST["password"] !== $_POST["confirmation"])        
        {
            apologize("You passwords do not match.");
        }
        
        //else tests passed: add user to database and login
        //insert user into database
        $insertion = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
            
        //test: check to see if insertion failed
        if($insertion === false)
        {
            apologize("Username already exists. Please try again.");
        }
    
        //else test passed: user inserted! initiate session and log user in
        $rows = query("SELECT LAST_INSERT_ID() AS id"); //get last id
        $id = $rows[0]["id"]; 
        $_SESSION["id"] = $id; //ad id to session
        redirect("/"); //redirect to index.php
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
?>
