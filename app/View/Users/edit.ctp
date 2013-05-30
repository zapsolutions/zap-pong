<div class="row-fluid">
	<div class="span4">
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
	<div class="span8">
		<?php echo $this->BootstrapForm->create('User', array('class' => 'form-horizontal', 'type' => 'file'));?>
			<fieldset>
				<legend>Edit Account Information</legend>
				<?php
				echo $this->BootstrapForm->input('email', array('required' => 'required'));
				echo $this->BootstrapForm->input('name', array('required' => 'required'));
				echo $this->BootstrapForm->input('alias');
				echo $this->BootstrapForm->input('avatar', array('type' => 'file'));
				echo $this->BootstrapForm->input('avatar_dir', array('type' => 'hidden'));
				echo $this->BootstrapForm->hidden('id');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>