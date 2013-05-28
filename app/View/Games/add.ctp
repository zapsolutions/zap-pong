<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Game', array('class' => 'form-horizontal', 'type' => 'file')); ?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Game')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('type', array(
					'type'  => 'hidden',
					'value' => 'Pong'
				));

				$chk0 = '<input type="radio" name="data[Action][key]" value="0" />';
				$chk1 = '<input type="radio" name="data[Action][key]" value="1" />';
				$chk2 = '<input type="radio" name="data[Action][key]" value="2" />';
				$chk3 = '<input type="radio" name="data[Action][key]" value="3" />';

				echo $this->BootstrapForm->input('Player.0.user_id', array(
					'type'    => 'select',
					'div'     => false,
					'before'  => '<div class="player input-prepend  input-append"><span class="add-on"><i class="icon-plus"></i></span>',
					'after'   => '<span class="add-on">' . $chk0 . '</span></div>',
					'label'   => false,
					'empty'   => 'Player',
					'options' => $users
				));
				echo $this->BootstrapForm->input('Player.0.result', array(
					'type' => 'hidden',
					'value' => 1
				));
				echo '<br />';
				echo $this->BootstrapForm->input('Player.1.user_id', array(
					'type'    => 'select',
					'div'     => false,
					'before'  => '<div class="player input-prepend input-append"><span class="add-on"><i class="icon-plus"></i></span>',
					'after'   => '<span class="add-on">' . $chk1 . '</span></div>',
					'label'   => false,
					'empty'   => 'Player',
					'options' => $users
				));
				echo $this->BootstrapForm->input('Player.1.result', array(
					'type' => 'hidden',
					'value' => 1
				));
				echo '<br />';
				echo $this->BootstrapForm->input('Player.2.user_id', array(
					'type'    => 'select',
					'div'     => false,
					'before'  => '<div class="player input-prepend input-append"><span class="add-on"><i class="icon-minus"></i></span>',
					'after'   => '<span class="add-on">' . $chk2 . '</span></div>',
					'label'   => false,
					'empty'   => 'Player',
					'options' => $users
				));
				echo $this->BootstrapForm->input('Player.2.result', array(
					'type' => 'hidden',
					'value' => 0
				));
				echo '<br />';
				echo $this->BootstrapForm->input('Player.3.user_id', array(
					'type'    => 'select',
					'div'     => false,
					'before'  => '<div class="player input-prepend input-append"><span class="add-on"><i class="icon-minus"></i></span>',
					'after'   => '<span class="add-on">' . $chk3 . '</span></div>',
					'label'   => false,
					'empty'   => 'Player',
					'options' => $users
				));
				echo $this->BootstrapForm->input('Player.3.result', array(
					'type' => 'hidden',
					'value' => 0
				));
				echo '<br />';
				echo $this->BootstrapForm->input('Action.type', array(
					'type'    => 'select',
					'div'     => false,
					'before'  => '<div class="player input-prepend"><span class="add-on"><i class="icon-flag"></i></span>',
					'after'   => '</div>',
					'label'   => false,
					'empty'   => 'Action',
					'options' => array('sink' => 'Sink', 'hit' => 'Hit', 'tk' => 'Team Kill')
				));
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