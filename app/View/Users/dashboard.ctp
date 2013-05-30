<div class="row-fluid">
	<div id="dash-card" class="span4">
		<div class="span-padding">
			<?php
			if (!empty($user['User']['avatar'])) {
				echo "<img src=\"/files/user/avatar/{$user['User']['id']}/profile_{$user['User']['avatar']}\" class=\"img-polaroid\" />";
			} else {
				echo '<img src="/img/anon.gif" class="img-polaroid" />';
			}
			?>
			<br/>
			<h3><?php echo $user['User']['name']; ?></h3>
			<h4><?php echo $user['User']['alias']; ?></h4>
		</div>
	</div>
	<div class="span4 dash-box">
		<div class="span-padding">
			<?php 
			echo $this->BootstrapForm->create('User', array(
				'type' => 'file',
				'url' => array('controller' => 'users', 'action' => 'edit')
			));
			?>
				<fieldset>
					<legend>Edit Account Information</legend>
					<?php
					echo $this->BootstrapForm->input('email', array(
						'required' => 'required',
						'div' => false,
						'before'  => '<div class="input-space input-prepend"><span class="add-on">Email</span>',
						'after' => '</div>',
						'label' => false
					));
					echo $this->BootstrapForm->input('name', array(
						'required' => 'required',
						'div' => false,
						'before'  => '<div class="input-space input-prepend"><span class="add-on">Name</span>',
						'after' => '</div>',
						'label' => false
					));
					echo $this->BootstrapForm->input('alias', array(
						'required' => 'required',
						'div' => false,
						'before'  => '<div class="input-space input-prepend"><span class="add-on">Alias</span>',
						'after' => '</div>',
						'label' => false
					));
					echo $this->BootstrapForm->input('avatar', array(
						'type' => 'file',
						'div' => false,
						'before' => '<div class="input-space">',
						'after' => '</div>',
						'label' => '<i class="icon-upload"></i> Avatar:'
					));
					echo $this->BootstrapForm->input('avatar_dir', array('type' => 'hidden'));
					echo $this->BootstrapForm->hidden('id');
					?>
					<?php echo $this->BootstrapForm->submit(__('Update Info'));?>
				</fieldset>
			<?php echo $this->BootstrapForm->end();?>
		</div>
	</div>
	<div class="span4 dash-box">
		<div class="span-padding">
			<?php
			echo $this->BootstrapForm->create('Game', array(
				'type' => 'file',
				'url' => array('controller' => 'games', 'action' => 'add')
			));
			?>
				<fieldset>
					<legend><?php echo __('New %s', __('Game')); ?></legend>
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
						'before'  => '<div class="input-space input-prepend  input-append"><span class="add-on"><i class="icon-plus"></i></span>',
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
						'before'  => '<div class="input-space input-prepend input-append"><span class="add-on"><i class="icon-plus"></i></span>',
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
						'before'  => '<div class="input-space input-prepend input-append"><span class="add-on"><i class="icon-minus"></i></span>',
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
						'before'  => '<div class="input-space input-prepend input-append"><span class="add-on"><i class="icon-minus"></i></span>',
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
						'before'  => '<div class="input-space input-prepend"><span class="add-on"><i class="icon-flag"></i></span>',
						'after'   => '</div>',
						'label'   => false,
						'empty'   => 'Action',
						'options' => array('sink' => 'Sink', 'hit' => 'Hit', 'tk' => 'Team Kill')
					));
					?>
					<?php echo $this->BootstrapForm->submit(__('Add Game'));?>
				</fieldset>
			<?php echo $this->BootstrapForm->end();?>
		</div>
	</div>
</div>