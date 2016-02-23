<!-- NOTA: Se puede encontrar el cheatsheet de los icons en http://fortawesome.github.io/Font-Awesome/3.2.1/cheatsheet/ -->
<!-- <nav class="navbar-inverse sidebar">
	<div class="navbar-inner">
   	<ul class="nav nav-stacked" id="sidebar-menu">
         <li>
            <?php echo $this->Html->link('<i class="icon-edit icon-large icon-large"></i><span>Contenidos</span>', '#', array('escape' => false, 'class' => 'menu-sections hasChild dropdown-close sidebar-item')); ?>
            <ul class="nav nav-stacked sub-nav  submenu-sections dropdown-close" style="display: none;">
               <li><?php echo $this->Html->link('<i class="icon-white icon-large"></i> <span>Generales</span>', array('controller' => 'sections', 'action' => 'index'), array('escape' => false, 'class' => 'menu-sections sidebar-item')); ?></li>
               <li><?php echo $this->Html->link('<i class="icon-white icon-large"></i> <span>Seo</span>', array('controller' => 'seos', 'action' => 'index'), array('escape' => false, 'class' => 'menu-seos sidebar-item')); ?></li>
            </ul>
         </li>
         <li>
            <?php echo $this->Html->link('<i class="icon-user icon-large icon-large"></i><span>Usuarios</span>', '#', array('escape' => false, 'class' => 'menu-users hasChild dropdown-close sidebar-item')); ?>
            <ul class="nav nav-stacked sub-nav  submenu-users dropdown-close" style="display: none;">
               <li><?php echo $this->Html->link('<i class="icon-white icon-large"></i> <span>Usuarios</span>', array('controller' => 'users', 'action' => 'index'), array('escape' => false, 'class' => 'menu-users sidebar-item')); ?></li>
            </ul>
         </li>
      </ul>
	</div>
</nav> -->



 <aside id="sidebar_left" class="nano nano-light affix">

        <!-- -------------- Sidebar Left Wrapper  -------------- -->
        <div class="sidebar-left-content nano-content">
            <!-- -------------- Sidebar Menu  -------------- -->
            <ul class="nav sidebar-menu">
                <li class="sidebar-label pt30">Menu</li>

                <li>

                    <a class="accordion-toggle menu-open" href="<?php echo $this->Html->url(array('controller' => 'sections', 'action' => 'index')); ?>">
                        <span class="fa fa-dashboard"></span>
                        <span class="sidebar-title">Generales</span>
                        <span class="caret"></span>
                    </a>
                    
                </li>

                <!-- -------------- Sidebar Progress Bars -------------- -->
              
               
            </ul>
            <!-- -------------- /Sidebar Menu  -------------- -->

            <!-- -------------- Sidebar Hide Button -------------- -->
            <div class="sidebar-toggler">
                <a href="#">
                    <span class="fa fa-arrow-circle-o-left"></span>
                </a>
            </div>
            <!-- -------------- /Sidebar Hide Button -------------- -->

        </div>
        <!-- -------------- /Sidebar Left Wrapper  -------------- -->

    </aside>