<div class="row-fluid">
	<div class="span11 offset1">
		<?php echo $this->BootstrapForm->create('User');?>
			<fieldset>
				<legend><?php echo __('Add %s', __('User')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('email');
				echo $this->BootstrapForm->input('name');
				echo $this->BootstrapForm->input('alias');
				echo $this->BootstrapForm->input('rating');
				echo $this->BootstrapForm->input('wins');
				echo $this->BootstrapForm->input('losses');
				echo $this->BootstrapForm->input('sinks');
				echo $this->BootstrapForm->input('hits');
				echo $this->BootstrapForm->input('tks');

				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>