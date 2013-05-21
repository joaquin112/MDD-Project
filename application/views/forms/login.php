<form action="<?php echo $this->config->item("base_url"); ?>forms/login" method="post">
    
    <?php if (isset($error)) {echo "<p>$error</p>";} ?>
    <p><label for="first">Username:</label><input type="text" name="username"/></p>
    <p><label for="first">Password: </label><input type="password" name="password"/></p>
    <p><input type="submit" name="submit" value="submit" /></p>
</form>