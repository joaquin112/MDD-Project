<p>Edit your profile on this page (changes will be available instantly)</p>


<form action="<?php echo $this->config->item("base_url"); ?>forms/updateprofile" method="post">
    
    <?php if (isset($error)) {echo "<p>$error</p>";} ?>
    <p><textarea style = "width: 100%; height: 150px;" name = "content"><?php echo $content; ?></textarea></p>
    <p><input type="submit" name="submit" value="submit" /></p>
</form>