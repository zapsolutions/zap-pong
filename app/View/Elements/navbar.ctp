<div id="navbar-row" class="row-fluid">
	<div class="span1 offset1">
		<img id="zap-logo" src="/img/zap.png" />
	</div>
	<div class="span10">
		<div class="navbar">
			<div class="navbar-inner">
				<?php if (isset($user)): ?>
					<a class="brand" href="#">Hello, <?php echo $user['User']['alias']; ?>!</a>
				<?php endif; ?>
				<ul class="nav pull-right">
					<?php if (isset($user)): ?>
						<li><a href="/"><i class="icon-list"></i> Leaderboard</a></li>
						<li><a href="/dashboard"><i class="icon-briefcase"></i> Dashboard</a></li>
						<li><a href="/teams"><i class="icon-random"></i> Teams</a></li>
						<li><a href="/logout"><i class="icon-off"></i> Logout</a></li>
					<?php else: ?>
						<li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Login <b class="caret"></b></a>
		                    <ul id="login-dropdown" class="dropdown-menu">
		                        <li>
		                        	<?php
		                        	echo $this->Form->create('User', array('url' => '/login'));
						 			echo $this->Form->input('email', array(
						 				'label' => false,
						 				'div' => false,
						 				'placeholder' => 'Email Address'
						 			));
									echo $this->Form->input('password', array(
										'label' => false,
										'div' => false,
										'placeholder' => 'Password'
									));
									echo $this->Form->end('Login');
									?>
		                        </li>
		                    </ul>
	               		</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>