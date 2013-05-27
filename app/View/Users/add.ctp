<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('User', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('User')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('email', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('password');
				echo $this->BootstrapForm->input('name', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('alias');
				echo $this->BootstrapForm->input('rating');
				echo $this->BootstrapForm->input('wins');
				echo $this->BootstrapForm->input('losess');
				echo $this->BootstrapForm->input('sinks');
				echo $this->BootstrapForm->input('hits');
				echo $this->BootstrapForm->input('tks');
				echo $this->BootstrapForm->input('action');
				echo $this->BootstrapForm->input('decay');
				echo $this->BootstrapForm->input('avatar');
				echo $this->BootstrapForm->input('avatar_dir');
				echo $this->BootstrapForm->input('role');
				echo $this->BootstrapForm->input('active');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Players')), array('controller' => 'players', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Player')), array('controller' => 'players', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>