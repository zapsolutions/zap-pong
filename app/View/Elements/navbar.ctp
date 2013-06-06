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
		                    <ul class="dropdown-menu">
		                        <li><a href="#">Action</a></li>
		                        <li><a href="#">Another action</a></li>
		                    </ul>
	               		</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>