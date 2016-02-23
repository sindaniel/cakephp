<?php 
if (empty($modelClass)) {
    $modelClass = Inflector::singularize($this->name);
}
$this->Html
	->addCrumb('<i class="icon-home icon-large"></i>', '/admin', array('escape' => false))
	->addCrumb('Usuarios', array('action' => 'index'))
	->addCrumb($this->data['User']['name'], array('action' => 'edit', $this->data['User']['id']));
?> 
<h2 class="hidden-desktop">Editar Usuario » <?php echo $this->data['User']['name']; ?></h2>
<?php echo $this->Form->create($modelClass);?>

<div class="row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
			<?php
			echo $this->Help->adminTab('Usuario', '#user-main');
			echo $this->Help->adminTabs();
			?>
		</ul>
		<div class="tab-content">
			<div id="user-main" class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array(
					'class' => 'span10',
					'label' => false,
				));
				echo $this->Form->input('name', array(
					'label' => 'Nombre',
				));
				echo $this->Form->input('username', array(
					'label' => 'Usuario',
				));
				echo $this->Form->input('email', array(
					'label' => 'E-mail',
				));
				echo $this->Form->input('password1', array(
					'label' => 'Contraseña', 
					'type' => 'password',
					'after' => '<br>Escriba una nueva si desea cambiarla. Para conservar la actual deje en blanco. (Máximo 20 caracteres)'
				));
			?>
			</div>
			<?php echo $this->Help->adminTabs(); ?>
		</div>
	</div>
	<div class="span4">
		<div class="row-fluid">
			<div class="span12">
				<div class="box">
					<div class="box-title">
						<i class="icon-list"></i>
						Acciones
					</div>
					<div class="box-content">
						<?php echo $this->Form->button('Aplicar', array('class' => 'btn', 'name' => 'apply')); ?>
						<?php echo $this->Form->button('Guardar', array('class' => 'btn btn-success')); ?>
						<?php echo $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Form->end(); ?>