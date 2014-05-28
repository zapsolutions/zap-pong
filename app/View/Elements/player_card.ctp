<div id="dash-card" class="span3 offset1 dash-box">
	<?php if (!empty($user['User']['avatar'])): ?>
		<img src="/files/user/avatar/<?= $user['User']['id'] ?>/profile_<?= $user['User']['avatar'] ?>" class="img-polaroid" />
	<?php else: ?>
		<img src="/img/anon.gif" class="img-polaroid" />
	<?php endif; ?>
	<br/>
	<h3><?= $user['User']['name']; ?></h3>
	<h4><?= $user['User']['alias']; ?></h4>
</div>