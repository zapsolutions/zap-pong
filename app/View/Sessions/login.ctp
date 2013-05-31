<div class="row-fluid">
	<div class="span4 offset4 dash-box">
		<div class="span-padding">
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->Form->create('User'); ?>
			<fieldset>
		    	<legend><? echo __('Login'); ?></legend>
		 		<?php echo $this->Form->input('email', array('label' => 'Email')); ?>
				<?php echo $this->Form->input('password', array('label' => 'Password')); ?>
			</fieldset>
			<?php echo $this->Form->end(__('Login')); ?>
		</div>
	</div>
</div>