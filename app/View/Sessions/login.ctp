<div class="row-fluid">
	<div class="span4 offset4 dash-box">
		<div class="span-padding">
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->Form->create('User'); ?>
			<fieldset>
		    	<legend><? echo __('Login'); ?></legend>
		 		<?php
		 			echo $this->Form->input('email', array(
		 				'label' => false,
		 				'div' => false,
		 				'placeholder' => 'Email Address'
		 			));
		 		?>
				<?php
					echo $this->Form->input('password', array(
						'label' => false,
						'div' => false,
						'placeholder' => 'Password'
					));
				?>
			</fieldset>
			<?php 
				echo $this->Form->submit('Login', array('class' => 'btn btn-large btn-success'));
				echo $this->Form->end();
			?>

		</div>
	</div>
</div>