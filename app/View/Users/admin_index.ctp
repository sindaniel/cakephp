<?php 
if (empty($modelClass)) {
	$modelClass = Inflector::singularize($this->name);
}

$this->Html
	->addCrumb('<i class="icon-home icon-large"></i>', '/admin', array('escape' => false))
	->addCrumb('Usuarios', array('controller' => 'users', 'action' => 'index'))
?> 
<h2 class="hidden-desktop">Usuarios</h2>
<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
			<li><?php echo $this->Html->link('Nuevo', array('action' => 'add'), array('class' => 'btn btn-success')); ?></li>
		</ul>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped">
			<?php
			$tableHeaders = array(
				$this->Paginator->sort('id', 'ID'),
				$this->Paginator->sort('name', 'Nombre'),
				$this->Paginator->sort('username', 'Usuario'),
				$this->Paginator->sort('email', 'E-mail'),
				'Acciones'
			);
			$tableHeaders = $this->Html->tableHeaders($tableHeaders);
			?>
			<thead>
				<?php echo $tableHeaders; ?>
			</thead>
			<?php
			$rows = array();
			foreach ($users as $item) {
				$actions = '<div class="item-actions">' . 
					$this->Html->link('<i class="icon-pencil icon-large"></i>',
						array('action' => 'edit', $item[$modelClass]['id']),
						array('data-title' => 'Editar este elemento', 'rel' => 'tooltip', 'data-trigger' => 'hover', 'escape' => false, 'class' => 'edit')
					) .
					$this->Html->link('<i class="icon-trash icon-large"></i>',
						array('action' => 'delete', $item[$modelClass]['id']),
						array('data-title' => 'Eliminar este elemento', 'rel' => 'tooltip', 'data-trigger' => 'hover', 'escape' => false, 'class' => 'delete'),
						'¿Realmente desea eliminar este elemento?'
					) .
				'</div>';
				$rows[] = array(
					$item[$modelClass]['id'],
					$item[$modelClass]['name'],
					$item[$modelClass]['username'],
					$item[$modelClass]['email'],
					$actions
				);
			}
			?>
			<?php echo $this->Html->tableCells($rows); ?>
		</table>

	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<?php if ($pagingBlock = $this->fetch('paging')): ?>
			<?php echo $pagingBlock; ?>
		<?php else: ?>
			<?php if (isset($this->Paginator) && isset($this->request['paging'])): ?>
				<div class="pagination">
					<p>
					<?php
					echo $this->Paginator->counter(array(
						'format' => 'Página {:page} de {:pages}, mostrando {:current} registros de {:count} totales, iniciando en el registro {:start}, finalizando en {:end}'
					));
					?>
					</p>
					<ul>
						<?php echo $this->Paginator->first('< ' . 'first'); ?>
						<?php echo $this->Paginator->prev('< ' . 'prev'); ?>
						<?php echo $this->Paginator->numbers(); ?>
						<?php echo $this->Paginator->next('next' . ' >'); ?>
						<?php echo $this->Paginator->last('last' . ' >'); ?>
					</ul>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
