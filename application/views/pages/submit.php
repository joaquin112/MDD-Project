<?php if ($username != "") { ?>

<form id="form_id" name="form_name" action="forms/submit" method="post">
	<p><label>Enter image title</label><input type="text" name="title" id="title" /></p>
	<p><label>Enter image URL</label><input type="text" name="imageurl" id="imageurl" /></p>
	<p><label>Enter meta tags separated by comas</label><textarea style = "width: 100%; height: 10px;" name = "meta_tags"></textarea></p>
	<input type="submit" name="submit" value="submit" />
</form>

<?php } ?>