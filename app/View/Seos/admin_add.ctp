<?php 
if (empty($modelClass)) {
    $modelClass = Inflector::singularize($this->name);
}
$this->Html
	->addCrumb('<i class="icon-home icon-large"></i>', '/admin', array('escape' => false))
	->addCrumb('Seo', array('action' => 'index'))
	->addCrumb('Nuevo', array('action' => 'add'));
?> 
<h2 class="hidden-desktop">Nuevo Seo</h2>
<?php echo $this->Form->create($modelClass);?>

<div class="row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
			<?php
			echo $this->Help->adminTab('Español', '#seo-main-es');
			echo $this->Help->adminTab('Inglés', '#seo-main-en');
			echo $this->Help->adminTabs();
			?>
		</ul>
		<div class="tab-content">
			<div id="seo-main-es" class="tab-pane">
				<?php
					echo $this->Form->input('id');
					$this->Form->inputDefaults(array(
						'class' => 'span10',
						'label' => false,
					));
					echo $this->Form->input('section', array(
						'label' => 'Sección',
						'type' => 'select',
						'options' => $section
					));
				?>
				<div class="input text">
					<label>Meta Title - Español</label>
					<?php
						echo $this->Form->textarea('meta_title_es', array(
							'class' => 'span10',
						));
					?>
				</div>
				<div class="input text">
					<label>Meta Description - Español</label>
					<?php
						echo $this->Form->textarea('meta_description_es', array(
							'class' => 'span10',
						));
					?>
				</div>
				<div class="input text">
					<label>Meta Keywords - Inglés</label>
					<?php
						echo $this->Form->textarea('meta_keywords_es', array(
							'class' => 'span10',
						));
					?>
				</div>
			</div>
			<div id="seo-main-en" class="tab-pane">
				<div class="input text">
					<label>Meta Title - Inglés</label>
					<?php
						echo $this->Form->textarea('meta_title_en', array(
							'class' => 'span10',
						));
					?>
				</div>
				<div class="input text">
					<label>Meta Description - Inglés</label>
					<?php
						echo $this->Form->textarea('meta_description_en', array(
							'class' => 'span10',
						));
					?>
				</div>
				<div class="input text">
					<label>Meta Keywords - Inglés</label>
					<?php
						echo $this->Form->textarea('meta_keywords_en', array(
							'class' => 'span10',
						));
					?>
				</div>
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