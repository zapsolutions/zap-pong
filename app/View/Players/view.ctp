<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Player');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($player['Player']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($player['User']['name'], array('controller' => 'users', 'action' => 'view', $player['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Game'); ?></dt>
			<dd>
				<?php echo $this->Html->link($player['Game']['id'], array('controller' => 'games', 'action' => 'view', $player['Game']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Result'); ?></dt>
			<dd>
				<?php echo h($player['Player']['result']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Action'); ?></dt>
			<dd>
				<?php echo h($player['Player']['action']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Player')), array('action' => 'edit', $player['Player']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Player')), array('action' => 'delete', $player['Player']['id']), null, __('Are you sure you want to delete # %s?', $player['Player']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Players')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Player')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Games')), array('controller' => 'games', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Game')), array('controller' => 'games', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

