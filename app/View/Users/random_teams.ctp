<script>
function showBtn(el) {
	$(el).show();
}
</script>
<div id="dash-row" class="row-fluid">
	<?php echo $this->element('player_card'); ?>
	<div class="span8 dash-box">
		<div class="span-padding">
			<?php 
			if (isset($selection)) {
				echo $this->BootstrapForm->create('Player', array('url' => array('controller' => 'users', 'action' => 'dashboard')));
				echo $this->BootstrapForm->hidden('game_ready', array('value' => 1));

				echo '<legend>Teams are...</legend>';
				$i = 0;
				$teams = array();
				echo '<div class="row-fluid"><div class="span6">';
				foreach ($selection as $player) {
					if (($i + 1) % 2) {
						echo '<div class="row-fluid"><div class="span12">';
					}
					if ($i === 0 || $i === 1) {
						$team = 1;
					} else {
						$team = 2;
					}
					$teams[$team][] = $player['User']['id']);
					echo '<div class="row-fluid"><div class="span12">';
					echo '<strong>Team ' . $team . ':</strong> ' . $player['User']['name'];
					echo '</div></div>';

					if($i == 1 || $i ==3) {
						echo '</div></div>';
					}
					$i++;
				}
				echo '</div>';
				echo '<div class="span6">';
				echo $this->BootstrapForm->hidden('teams', array('value' => serialize($teams)));
				echo $this->BootstrapForm->input('winner', array(
					'label' => $this->Html->tag('strong', 'Winners'), 
					'type' => 'radio', 
					'options' => array(1 => 'Team 1', 2 => 'Team 2'),
					'onClick' => 'showBtn(".js-complete-game")'));
				echo '</div></div>';
				echo $this->BootstrapForm->submit('Next...', array(
					'div' => false,
					'class' => 'btn btn-large btn-success js-complete-game',
					'style' => 'display: none;'
				));
				echo $this->BootstrapForm->end();
			}
			?>
			<?php
			echo $this->BootstrapForm->create('User');
			echo '<legend>Select Players for Teams</legend>';
			$k = 0;
			$i = 0;
			foreach ($users as $key => $value) {
				if ($i === 0) {
					echo '<div class="row-fluid">';
				}
				echo '<div class="span3">';
				echo $this->BootstrapForm->input('User.' . $k, array(
					'type' => 'checkbox',
					'value' => $key,
					'label' => $value,
					'hiddenField' => false
				));
				echo '</div>';
				if ($i === 3) {
					echo '</div>';
					$i = 0;
				} else {
					$i++;
				}
				$k++;
			}
			echo $this->BootstrapForm->submit('Pick Teams', array(
				'div' => false,
				'class' => 'btn btn-large btn-success'
			));
			echo $this->BootstrapForm->end();
			?>
		</div>
	</div>
</div>