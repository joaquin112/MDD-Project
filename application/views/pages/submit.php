<?php if ($username != "") { ?>

<form id="form_id" name="form_name" action="forms/submit" method="post">
	<p><label for="first">Enter image title</label><input type="text" name="title" id="title" /></p>
	<p><label for="first">Enter image URL</label><input type="text" name="imageurl" id="imageurl" /></p>
	<input type="submit" name="submit" value="submit" />
</form>

<?php } ?>