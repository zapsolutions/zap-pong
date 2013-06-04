<div class="row-fluid">
	<div class="span9 dash-box">
		<table class="table table-hover table-condensed table-striped">
			<tr>
				<th>Rating</th>
				<th></th>
				<th>Player</th>
				<th>Wins</th>
				<th>Losses</th>
			</tr>
		<?php
			foreach ($ratings as $rating) {
				echo '<tr>';
				echo '<td>' . $rating['User']['rating'] . '</td>';
				echo '<td>' . "<img src=\"/files/user/avatar/{$rating['User']['id']}/thumb_{$rating['User']['avatar']}\" /></td>";
				echo '<td>' . $rating['User']['name'] . '</td>';
				echo '<td>' . $rating['User']['wins'] . '</td>';
				echo '<td>' . $rating['User']['losses'] . '</td>';
				echo '</tr>';
			}
			?>
		</table>
	</div>
	<div class="span3">

	</div>
</div>