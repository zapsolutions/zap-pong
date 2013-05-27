<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('User');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($user['User']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Email'); ?></dt>
			<dd>
				<?php echo h($user['User']['email']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Password'); ?></dt>
			<dd>
				<?php echo h($user['User']['password']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($user['User']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Alias'); ?></dt>
			<dd>
				<?php echo h($user['User']['alias']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Rating'); ?></dt>
			<dd>
				<?php echo h($user['User']['rating']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Wins'); ?></dt>
			<dd>
				<?php echo h($user['User']['wins']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Losess'); ?></dt>
			<dd>
				<?php echo h($user['User']['losess']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Sinks'); ?></dt>
			<dd>
				<?php echo h($user['User']['sinks']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Hits'); ?></dt>
			<dd>
				<?php echo h($user['User']['hits']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Tks'); ?></dt>
			<dd>
				<?php echo h($user['User']['tks']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Action'); ?></dt>
			<dd>
				<?php echo h($user['User']['action']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Decay'); ?></dt>
			<dd>
				<?php echo h($user['User']['decay']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Avatar'); ?></dt>
			<dd>
				<?php echo h($user['User']['avatar']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Avatar Dir'); ?></dt>
			<dd>
				<?php echo h($user['User']['avatar_dir']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Role'); ?></dt>
			<dd>
				<?php echo h($user['User']['role']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Active'); ?></dt>
			<dd>
				<?php echo h($user['User']['active']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($user['User']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($user['User']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('User')), array('action' => 'edit', $user['User']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('User')), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Players')), array('controller' => 'players', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Player')), array('controller' => 'players', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Players')); ?></h3>
	<?php if (!empty($user['Player'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Game Id'); ?></th>
				<th><?php echo __('Result'); ?></th>
				<th><?php echo __('Action'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($user['Player'] as $player): ?>
			<tr>
				<td><?php echo $player['id'];?></td>
				<td><?php echo $player['user_id'];?></td>
				<td><?php echo $player['game_id'];?></td>
				<td><?php echo $player['result'];?></td>
				<td><?php echo $player['action'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'players', 'action' => 'view', $player['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'players', 'action' => 'edit', $player['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'players', 'action' => 'delete', $player['id']), null, __('Are you sure you want to delete # %s?', $player['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Player')), array('controller' => 'players', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
