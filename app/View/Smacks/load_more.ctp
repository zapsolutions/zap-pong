<?php
foreach ($smacks as $smack) {
	$timeAgo = $this->Time->timeAgoInWords($smack['Smack']['created']);
	if ($smack['Smack']['anonymity'] === true) {
		echo "<p><i class=\"icon-eye-close\"></i>&nbsp;<em>Anonymous said...</em> ({$timeAgo})</p>";
	} elseif ($smack['Smack']['anonymity'] === false) {
		echo "<p><i class=\"icon-user\"></i>&nbsp;<em>{$smack['User']['alias']} said...</em> ({$timeAgo})</p>";
	}
	echo "<p>{$smack['Smack']['message']}</p>";
}
?>