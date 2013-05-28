<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Players'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('user_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('game_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('result');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('action');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($players as $player): ?>
			<tr>
				<td><?php echo h($player['Player']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($player['User']['name'], array('controller' => 'users', 'action' => 'view', $player['User']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($player['Game']['id'], array('controller' => 'games', 'action' => 'view', $player['Game']['id'])); ?>
				</td>
				<td><?php echo h($player['Player']['result']); ?>&nbsp;</td>
				<td><?php echo h($player['Player']['action']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $player['Player']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $player['Player']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $player['Player']['id']), null, __('Are you sure you want to delete # %s?', $player['Player']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Player')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Games')), array('controller' => 'games', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Game')), array('controller' => 'games', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>