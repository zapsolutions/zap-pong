<div class="row-fluid">
	<div class="span11 offset1 dash-box">
		<div class="span-padding">
			<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'forgot_password'))); ?>
	    	<fieldset>
	        	<legend><?php echo __('Please enter your email address.'); ?></legend>
	    		<?php
	    		echo $this->Form->input('email', array(
	    			'label' => false,
	    			'div' => false,
	    			'placeholder' => 'Email address'
	    		)); 
	    		?>
	    	</fieldset>
			<?php echo $this->Form->end(__('Reset My Password')); ?>
		</div>
	</div>
</div>