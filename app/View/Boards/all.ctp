<div class="row-fluid row-board">
	<div class="span11 offset1 dash-box">
		<div class="span-padding">
			<h1>Leaderboard</h1>
			<table id="leaderboard" class="table table-hover table-condensed table-striped">
				<tr>
					<th class="mobile">Rank</th>
					<th class="mobile">Rating</th>
					<th class="mobile"></th>
					<th class="mobile">Player</th>
					<th>Wins</th>
					<th>Losses</th>
					<th>Total</th>
					<th>Win %</th>
					<th>Sinks</th>
					<th>Hits</th>
					<th>TKs</th>
					<th>Decay</th>
					<th>Action %</th>
					<th>Streak</th>
				</tr>
				<?php
				$rank = 1;
				foreach ($ratings as $rating) {
					switch ($rank) {
						case 1:
							$badge = 'badge-warning';
							break;
						case 2:
							$badge = '';
							break;
						case 3:
							$badge = 'badge-important';
							break;
						default:
							$badge = 'badge-inverse';
							break;
					}
					echo '<tr>';
					echo '<td class="mobile rank">' . '<span class="badge '. $badge . '">' . $rank . '</span></td>';
					echo '<td class="mobile">' . $rating['User']['rating'] . '</td>';
					if ($rating['User']['avatar'] !== null) {
						echo '<td class="mobile">' . "<a href=\"/files/user/avatar/{$rating['User']['id']}/profile_{$rating['User']['avatar']}\" class=\"img-modal\"><img src=\"/files/user/avatar/{$rating['User']['id']}/thumb_{$rating['User']['avatar']}\" /></a></td>";
					} else {
						echo '<td class="mobile">' . "<img src=\"/img/anon_thumb.gif\" /></td>";
					}
					if ($authenticated === true) {
						echo '<td class="mobile">' . $rating['User']['alias'] . '</td>';
					} else {
						echo '<td class="mobile">' . $rating['User']['name'] . '</td>';
					}
					echo '<td>' . $rating['User']['wins'] . '</td>';
					echo '<td>' . $rating['User']['losses'] . '</td>';
					echo '<td>' . $rating['User']['total_games'] . '</td>';
					$win_percentage = ($rating['User']['wins'] / $rating['User']['total_games']) * 100;
					echo '<td>' . $this->Number->toPercentage($win_percentage) . '</td>';
					echo '<td>' . $rating['User']['sinks'] . '</td>';
					echo '<td>' . $rating['User']['hits'] . '</td>';
					echo '<td>' . $rating['User']['tks'] . '</td>';
					echo '<td>' . $rating['User']['decay'] . '</td>';
					$action_percentage = (($rating['User']['sinks'] + $rating['User']['hits']) / $rating['User']['total_games']) * 100;
					echo '<td>' . $this->Number->toPercentage($action_percentage) . '</td>';
					if ($rating['User']['streak'] > 0) {
						$streak = '+' . $rating['User']['streak'];
					} else {
						$streak = $rating['User']['streak'];
					}
					echo '<td>' . $streak . '</td>';
					echo '</tr>';
					$rank++;
				}
				?>
			</table>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span11 offset1 dash-box">
		<div class="span-padding">
			<h1>Game History</h1>
			<table id="game-history" class="table table-hover table-condensed table-striped">
				<th>Winners</th>
				<th></th>
				<th>Losers</th>
				<th></th>
				<th>Actor</th>
				<th>Action</th>
				<th></th>
				<?php
				foreach ($games as $game) {
					echo '<tr>';
					$winners = array();
					$losers = array();
					$actor = array();
					foreach ($game['Player'] as $player) {
						if ($player['result'] === true) {
							$winners[]['User'] = $player['User'];
						}
						if ($player['result'] === false) {
							$losers[]['User'] = $player['User'];
						}
						if (!empty($player['action'])) {
							$actor['User'] = $player['User'];
							$actor['action'] = $player['action'];
						}
					}
					foreach ($winners as $winner) {
						if ($winner['User']['avatar'] !== null) {
							$userAvatar = "<a href=\"/files/user/avatar/{$winner['User']['id']}/profile_{$winner['User']['avatar']}\" class=\"img-modal\"><img src=\"/files/user/avatar/{$winner['User']['id']}/thumb_{$winner['User']['avatar']}\" /></a>";
						} else {
							$userAvatar =  "<img src=\"/img/anon_thumb.gif\" /></td>";
						}
						if ($authenticated === true) {
							echo '<td class="winner">' . $userAvatar . ' ' . $winner['User']['alias'] . '</td>';
						} else {
							echo '<td class="winner">' . $userAvatar . ' ' . $winner['User']['name'] . '</td>';
						}
					}
					foreach ($losers as $loser) {
						if ($loser['User']['avatar'] !== null) {
							$userAvatar = "<a href=\"/files/user/avatar/{$loser['User']['id']}/profile_{$loser['User']['avatar']}\" class=\"img-modal\"><img src=\"/files/user/avatar/{$loser['User']['id']}/thumb_{$loser['User']['avatar']}\" /></a>";
						} else {
							$userAvatar =  "<img src=\"/img/anon_thumb.gif\" /></td>";
						}
						if ($authenticated === true) {
							echo '<td class="loser">' . $userAvatar . ' ' . $loser['User']['alias'] . '</td>';
						} else {
							echo '<td class="loser">' . $userAvatar . ' ' . $loser['User']['name'] . '</td>';
						}
					}
					if ($actor['User']['avatar'] !== null) {
						$userAvatar = "<a href=\"/files/user/avatar/{$actor['User']['id']}/profile_{$actor['User']['avatar']}\" class=\"img-modal\"><img src=\"/files/user/avatar/{$actor['User']['id']}/thumb_{$actor['User']['avatar']}\" /></a>";
					} else {
						$userAvatar =  "<img src=\"/img/anon_thumb.gif\" /></td>";
					}
					if ($authenticated === true) {
						echo '<td class="actor">' . $userAvatar . ' ' . $actor['User']['alias'] . '</td>';
					} else {
						echo '<td class="actor">' . $userAvatar . ' ' . $actor['User']['name'] . '</td>';
					}
					echo '<td class="action">' . ucwords($actor['action']) . '</td>';
					echo '<td>' . $this->Time->timeAgoInWords($game['Game']['created']) . '</td>';
					echo '</tr>';
				}
				?>
			</table>
		</div>
	</div>
</div>


<script type="text/javascript">
	$('.img-modal').on('click', function(e) {
	    e.preventDefault();
	    $("#modal-img-target").attr("src", this);
	    $('#modal').modal('show');
	});
</script>

<div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <div class="modal-body">
        <img id="modal-img-target">
    </div>
</div>