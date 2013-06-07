<div class="row-fluid">
	<div class="span11 offset1 dash-box">
		<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'forgot_password'))); ?>
    	<fieldset>
        	<legend><?php echo __('Please enter your email address.'); ?></legend>
    		<?php echo $this->Form->input('email'); ?>
    	</fieldset>
		<?php echo $this->Form->end(__('Reset Password')); ?>
	</div>
</div>