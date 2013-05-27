<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Game', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Game')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('type');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Games')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Players')), array('controller' => 'players', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Player')), array('controller' => 'players', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>