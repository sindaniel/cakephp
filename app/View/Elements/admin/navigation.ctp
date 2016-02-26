


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
                    </a>
                    
                </li>




                 <li>

                    <a class="accordion-toggle menu-open" href="<?php echo $this->Html->url(array('controller' => 'cars', 'action' => 'index')); ?>">
                        <span class="fa fa-car"></span>
                        <span class="sidebar-title">Carros</span>
                    </a>
                    
                </li>



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