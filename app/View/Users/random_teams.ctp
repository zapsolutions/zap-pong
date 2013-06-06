<div id="dash-row" class="row-fluid">
	<?php echo $this->element('player_card'); ?>
	<div class="span8 dash-box">
		<div class="span-padding">
			<?php
			if (isset($selection)) {
				echo '<legend>Teams are...</legend>';
				$i = 0;
				foreach ($selection as $player) {
					echo '<div class="row-fluid">';
					echo '<div class="span12">';
					if ($i === 0 || $i === 1) {
						$team = 1;
					} else {
						$team = 2;
					}
					echo '<strong>Team ' . $team . ':</strong> ' . $player['User']['name'];
					echo '</div></div>';
					$i++;
				}
			}
			?>
				<div class="row-fluid">
				<?php
				echo $this->BootstrapForm->create('User');
				echo '<legend>Select Players for Teams</legend>';
				$i = 0;
				foreach ($users as $key => $value) {
					echo '<div class="span4">';
					echo $this->BootstrapForm->input('User.' . $i, array(
						'type' => 'checkbox',
						'value' => $key,
						'label' => $value,
						'hiddenField' => false
					));
					echo '</div>';
					$i++;
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
</div>