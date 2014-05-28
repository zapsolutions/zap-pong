<?php foreach ($smacks as $smack): ?>
	<?php $timeAgo = $this->Time->timeAgoInWords($smack['Smack']['created'], array('end' => '+1 year')); ?>
	<?php if ($smack['Smack']['anonymity'] === true): ?>
		<p><i class="icon-eye-close"></i> <em>Anonymous said...</em> (<?= $timeAgo ?>)</p>
	<?php else: ?>
		<p><i class=\"icon-user\"></i> <em><?= $smack['User']['alias'] ?> said...</em> (<?= $timeAgo ?>)</p>
	<?php endif; ?>
	<p><?= $smack['Smack']['message'] ?></p>
<?php endforeach; ?>