<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Users'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('email');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('password');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('name');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('alias');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('rating');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('wins');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('losess');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('sinks');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('hits');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('tks');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('action');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('decay');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('avatar');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('avatar_dir');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('role');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('active');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('created');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['alias']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['rating']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['wins']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['losess']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['sinks']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['hits']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['tks']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['action']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['decay']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['avatar']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['avatar_dir']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['active']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Players')), array('controller' => 'players', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Player')), array('controller' => 'players', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>