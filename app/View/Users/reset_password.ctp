<div class="row-fluid">
	<div class="span11 offset1 dash-box">
		<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend><?php echo __('Type in your new password.'); ?></legend>
			<?php
				echo $this->Form->input('password', array(
					'type' => 'password',
					'label' => false,
					'div' => false,
					'placeholder' => 'Password'
				));
				echo $this->Form->input('password_confirm', array(
					'type'  => 'password',
					'label' => false,
					'div' => false,
					'placeholder' => 'Confirm Password'
				));
			?>
		</fieldset>
		<?php echo $this->Form->end(__('Reset My Password')); ?>
	</div>
</div>