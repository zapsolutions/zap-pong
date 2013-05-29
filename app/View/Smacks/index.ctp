<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Smacks'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('message');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('users_id');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($smacks as $smack): ?>
			<tr>
				<td><?php echo h($smack['Smack']['id']); ?>&nbsp;</td>
				<td><?php echo h($smack['Smack']['message']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($smack['Users']['name'], array('controller' => 'users', 'action' => 'view', $smack['Users']['id'])); ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $smack['Smack']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $smack['Smack']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $smack['Smack']['id']), null, __('Are you sure you want to delete # %s?', $smack['Smack']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('New %s', __('Smack')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Users')), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>