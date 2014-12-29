<?php
    // configuration
    require("../includes/config.php");
    
    //if password change form submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $current_pass = query("SELECT hash FROM users WHERE id = ?", $_SESSION["id"]);
        $current_pass = $current_pass[0]["hash"];
        
        if (empty($_POST["old_pass"]) || empty($_POST["new_pass"]) || empty($_POST["conf_pass"]))
        {
            apologize("You must complete all fields.");
        }
        else if ($current_pass !== crypt($_POST["old_pass"], $current_pass))
        {
            apologize("You have typed in the wrong password.");
        }
        else if ($_POST["new_pass"] !== $_POST["conf_pass"])
        {
            apologize("You haven't confirmed your new password properly.");
        }
        else if ($_POST["old_pass"] == $_POST["new_pass"])
        {
            apologize("Your must change your password.");
        }
        query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["new_pass"], $current_pass), $_SESSION["id"]);
        render("passchange_confirmation.php", ["title" => "Password Change Confirmation"]);
    }
    else
    {
        render("passchange_form.php", ["title" => "Change Password"]);
    } 
?>
