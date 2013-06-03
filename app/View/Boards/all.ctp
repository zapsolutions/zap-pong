<div class="row-fluid">
	<div class="span9">
		<table class="table table-hover table-condensed table-striped">
			<tr>
				<th>Rating</th>
				<th>Player</th>
				<th>Wins</th>
				<th>Losses</th>
			</tr>
		<?php
			foreach ($ratings as $rating) {
				echo '<tr>';
				echo '<td>' . $rating['User']['rating'] . '</td>';
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