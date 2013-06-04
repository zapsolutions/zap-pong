<div id="dash-row" class="row-fluid">
	<?php echo $this->element('player_card'); ?>
	<div class="span8">
		<div class="row-fluid">
		<?php
		echo $this->BootstrapForm->create('User');
		$i = 0;
		foreach ($users as $key => $value) {
			echo '<div class="span3">';
			echo $this->BootstrapForm->input('User.' . $i, array(
				'type' => 'checkbox',
				'value' => $key,
				'label' => $value
			));
			echo '</div>';
			$i++;
		}
		echo $this->BootstrapForm->end('Generate!', array('div' => false));
		?>
		</div>
	</div>
</div>