<?php
	if (!array_filter((array) $data)) {
		$data = array(
			"image" => "",
			"size" => "medium"
		);
	}
?>

<!-- <fieldset>
	<label>Image URL <small>(should be stored on the local server)</small></label>
	<input type="text" name="image" value="<?php // echo htmlspecialchars($data["image"])?>">
</fieldset> -->

<fieldset>
	<label>Point Size <small>(small is 8x8, medium is 12x12, large is 20x20)</small></label>
	<select name="size">
		<option value="small"<?php if ($data["size"] == "small") { ?> selected="selected"<?php } ?>>Small</option>
		<option value="medium"<?php if ($data["size"] == "medium") { ?> selected="selected"<?php } ?>>Medium</option>
		<option value="large"<?php if ($data["size"] == "lare") { ?> selected="selected"<?php } ?>>Large</option>
	</select>
</fieldset>