<header class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<span class="hidden-phone">
			<?php echo $this->Html->link(Configure::read('Site.title'), '/admin', array('class' => 'brand ellipsis')); ?>
			</span>
			<span class="hidden-desktop hidden-tablet">
			<?php echo $this->Html->link(Configure::read('Site.title'), '/admin', array('class' => 'brand')); ?>
			</span>
			<div class="nav-collapse collapse" style="height: 0px; ">
				<ul class="nav" id="top-left-menu">
					<li><?php echo $this->Html->link('Visitar el sitio', '/', array('class' => 'menu-visit-website sidebar-item', 'target' => 'blank')); ?></li>
				</ul>
			<?php if ($this->Session->read('Auth.User.id')): ?>
				<ul class="nav pull-right" id="top-right-menu">
					<li class="dropdown">
						<?php echo $this->Html->link($this->Html->image('http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=23', array('class' => 'img-rounded')) . ' ' . $this->Session->read('Auth.User.username') . '<b class="caret"></b>', '#', array('escape' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')); ?>
						<ul class="dropdown-menu">
							<li>
								<?php echo $this->Html->link('<i class="icon-user icon-large"></i> Perfil', array('controller' => 'users', 'action' => 'admin_edit', $this->Session->read('Auth.User.id')), array('class' => 'menu-profile', 'escape' => false)); ?>
							</li>
							<li class="divider"></li>
							<li>
								<?php echo $this->Html->link('<i class="icon-off icon-large"></i> Salir', array('controller' => 'Users', 'action' => 'logout'), array('class' => 'menu-logout', 'escape' => false)); ?>
							</li>
						</ul>
					</li>
				</ul>
			<?php endif; ?>
			</div>
		</div>
	</div>
</header>