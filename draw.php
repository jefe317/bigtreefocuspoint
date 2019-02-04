<?php
	if (empty($field["value"]) || !is_array($field["value"])) {
		$field["value"] = array("left" => "50", "top" => "50", "image" => "https://jefftml.s3.amazonaws.com/files/resources/empire-state-building.jpg");
	}

	if ($field["options"]["size"] == "small") {
		$margin = 4;
		$border = 2;
		$size = 4;
	} elseif ($field["options"]["size"] == "large") {
		$margin = 10;
		$border = 5;
		$size = 10;
	} else {
		$margin = 6;
		$border = 4;
		$size = 8;
	}
?>
<style>
	#<?=$field["id"]?>_container {
		position: relative;
	}

	#<?=$field["id"]?>_container img {
		display: block;
		width: 100%;
	}

	#<?=$field["id"]?>_point {
		background: #59A8E9;
		border: <?=$border?>px solid #333;
		border-radius: 100%;
		cursor: grab;
		height: <?=$size?>px;
		margin: -<?=$margin?>px 0 0 -<?=$margin?>px;
		position: absolute;
		width: <?=$size?>px;
	}

	#<?=$field["id"]?>_point.ui-draggable-dragging {
		cursor: grabbing;
	}
</style>

<div class="form_fields">
	<fieldset>
		<label>Focus Point</label>
		<div id="<?=$field["id"]?>_container">
			<input type="hidden" id="<?=$field["id"]?>" name="<?=$field["key"]?>" value="<?=htmlspecialchars(json_encode($field["value"]))?>">
			<img src="<?=$field["value"]["image"]?>">
			<div id="<?=$field["id"]?>_point" style="left: <?=$field["value"]["left"]?>%; top: <?=$field["value"]["top"]?>%;"></div>
		</div>
	</fieldset>
	<fieldset>
		<label>URL</label>
		<div class="text_input">
			<input type="text" id="<?=$field["id"]?>_image" value="<?=$field["value"]["image"]?>">
		</div>
	</fieldset>
</div>

<script>
	$("#<?=$field["id"]?>_point").draggable({
		containment: "parent",
		stop: function(event, ui) {
			var container = $("#<?=$field["id"]?>_container");
			var container_offset = container.offset();

			// Calculate the offset %
			var left = 100 * (ui.offset.left - container_offset.left) / container.width();
			var top = 100 * (ui.offset.top - container_offset.top) / container.height();

			// Get value of text box
			var urlinput = $("#<?=$field["id"]?>_image").val();
			// Set the hidden field value
			// container.find("input").val(JSON.stringify({ left: left, top: top }));
			$("#<?=$field["id"]?>").val(JSON.stringify({ left: left, top: top, image: urlinput }));
		}
	});
</script>