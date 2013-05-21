<form id = 'register' action="<?php echo $this->config->item("base_url"); ?>forms/register" method="post">
    <?php if (isset($error)) {echo "<p>$error</p>";} ?>
    <p><label for="first">Username:</label><input type="text" name="username"/></p>
    <p><label for="first">Password: </label><input type="password" name="password"/></p>
    <p><label for="first">Email: </label><input type="text" id = 'firstemail' name="email"/></p>
    
    <p><input id = 'checkboxyes' type="checkbox" name="receive"><label for = 'checkboxyes'>I want to join the mailing list and receive free bonuses.</label></p>
    
    <p><input type="submit" name="submit" value="submit" /></p>
</form>