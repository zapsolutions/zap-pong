<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Smack');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($smack['Smack']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Message'); ?></dt>
			<dd>
				<?php echo h($smack['Smack']['message']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Users'); ?></dt>
			<dd>
				<?php echo $this->Html->link($smack['Users']['name'], array('controller' => 'users', 'action' => 'view', $smack['Users']['id'])); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Smack')), array('action' => 'edit', $smack['Smack']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Smack')), array('action' => 'delete', $smack['Smack']['id']), null, __('Are you sure you want to delete # %s?', $smack['Smack']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Smacks')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Smack')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Users')), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

