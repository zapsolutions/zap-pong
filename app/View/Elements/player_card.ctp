<div id="dash-card" class="span3 offset1 dash-box">
	<?php
	if (!empty($user['User']['avatar'])) {
		echo "<img src=\"/files/user/avatar/{$user['User']['id']}/profile_{$user['User']['avatar']}\" class=\"img-polaroid\" />";
	} else {
		echo '<img src="/img/anon.gif" class="img-polaroid" />';
	}
	?>
	<br/>
	<h3><?php echo $user['User']['name']; ?></h3>
	<h4><?php echo $user['User']['alias']; ?></h4>
</div>