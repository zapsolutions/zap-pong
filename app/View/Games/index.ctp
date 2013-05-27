<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Games'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('type');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('created');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($games as $game): ?>
			<tr>
				<td><?php echo h($game['Game']['id']); ?>&nbsp;</td>
				<td><?php echo h($game['Game']['type']); ?>&nbsp;</td>
				<td><?php echo h($game['Game']['created']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $game['Game']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $game['Game']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $game['Game']['id']), null, __('Are you sure you want to delete # %s?', $game['Game']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('New %s', __('Game')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Players')), array('controller' => 'players', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Player')), array('controller' => 'players', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>