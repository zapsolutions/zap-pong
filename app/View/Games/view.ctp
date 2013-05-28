<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Game');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($game['Game']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Type'); ?></dt>
			<dd>
				<?php echo h($game['Game']['type']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($game['Game']['created']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Game')), array('action' => 'edit', $game['Game']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Game')), array('action' => 'delete', $game['Game']['id']), null, __('Are you sure you want to delete # %s?', $game['Game']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Games')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Game')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Players')), array('controller' => 'players', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Player')), array('controller' => 'players', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Players')); ?></h3>
	<?php if (!empty($game['Player'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Game Id'); ?></th>
				<th><?php echo __('Result'); ?></th>
				<th><?php echo __('Action'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($game['Player'] as $player): ?>
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
