<div class="row-fluid">
	<div class="span12 dash-box">
		<table class="table table-hover table-condensed table-striped">
			<tr>
				<th>Rating</th>
				<th></th>
				<th>Player</th>
				<th>Wins</th>
				<th>Losses</th>
				<th>Total</th>
				<th>Win %</th>
				<th>Sinks</th>
				<th>Hits</th>
				<th>TKs</th>
				<th>Action %</th>
				<th>Streak</th>
			</tr>
			<?php
			foreach ($ratings as $rating) {
				echo '<tr>';
				echo '<td>' . $rating['User']['rating'] . '</td>';
				if ($rating['User']['avatar'] !== null) {
					echo '<td>' . "<img src=\"/files/user/avatar/{$rating['User']['id']}/thumb_{$rating['User']['avatar']}\" /></td>";
				} else {
					echo '<td>' . "<img src=\"/img/anon_thumb.gif\" /></td>";
				}
				echo '<td>' . $rating['User']['name'] . '</td>';
				echo '<td>' . $rating['User']['wins'] . '</td>';
				echo '<td>' . $rating['User']['losses'] . '</td>';
				echo '<td>' . $rating['User']['total_games'] . '</td>';
				$win_percentage = ($rating['User']['wins'] / $rating['User']['total_games']) * 100;
				echo '<td>' . $this->Number->toPercentage($win_percentage) . '</td>';
				echo '<td>' . $rating['User']['sinks'] . '</td>';
				echo '<td>' . $rating['User']['hits'] . '</td>';
				echo '<td>' . $rating['User']['tks'] . '</td>';
				$action_percentage = (($rating['User']['sinks'] + $rating['User']['hits']) / $rating['User']['total_games']) * 100;
				echo '<td>' . $this->Number->toPercentage($action_percentage) . '</td>';
				if ($rating['User']['streak'] > 0) {
					$streak = '+' . $rating['User']['streak'];
				} else {
					$streak = $rating['User']['streak'];
				}
				echo '<td>' . $streak . '</td>';
				echo '</tr>';
			}
			?>
		</table>
	</div>
</div>