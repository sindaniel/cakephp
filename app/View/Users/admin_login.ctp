<?php echo $this->Form->create('User', ['id'=>'form-login']); ?>
 
    <div class="panel-body pn mv10">

        <div class="section">
            <label for="username" class="field prepend-icon">
                
                <?php 
                echo $this->Form->input('username', array(
					'placeholder' => 'Usuario',
					'label' => false,
					'div' => false,
					'class' => 'gui-input',
				)); ?>

                <label for="username" class="field-icon">
                    <i class="fa fa-user"></i>
                </label>
            </label>
        </div>
        <!-- -------------- /section -------------- -->

        <div class="section">
            <label for="password" class="field prepend-icon">
               <?php 
                echo $this->Form->input('password', array(
					'placeholder' => 'Contraseña',
						'type' => 'password', 
					'label' => false,
					'div' => false,
					'class' => 'gui-input',
				)); ?>
                <label for="password" class="field-icon">
                    <i class="fa fa-lock"></i>
                </label>
            </label>
        </div>
        <!-- -------------- /section -------------- -->

        <div class="section text-center">
            
            <button type="submit" class="btn btn-bordered btn-primary ">Ingresar</button>
        </div>
        <!-- -------------- /section -------------- -->

    </div>
    <!-- -------------- /Form -------------- -->
<?php echo $this->Form->end(); ?>