<h1 class="subhead">Change Password</h1>
<form action="passchange.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="old_pass" placeholder="Enter Current Password" type="text"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="new_pass" placeholder="New Password" type="text"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="conf_pass" placeholder="Confirm New Password" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Change Password</button>
        </div>
    </fieldset>
</form>
<div class="formmsg">
    <a href="index.php">Back To Portfolio</a>
</div>
