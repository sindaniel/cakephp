<?php 
if (empty($modelClass)) {
    $modelClass = Inflector::singularize($this->name);
}

$this->Html
    ->addCrumb('<i class="icon-home icon-large"></i>', '/admin', array('escape' => false))
    ->addCrumb('Generales', array('controller' => 'seos', 'action' => 'index'))
?> 
<h2 class="hidden-desktop">Seo</h2>
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
                $this->Paginator->sort('section', 'Sección'),
                $this->Paginator->sort('meta_title_es', 'Meta Title - Es'),
                $this->Paginator->sort('meta_description_es', 'Meta Description - Es'),
                $this->Paginator->sort('meta_keywords_es', 'Meta Keywords - Es'),
                'Acciones'
            );
            $tableHeaders = $this->Html->tableHeaders($tableHeaders);
            ?>
            <thead>
                <?php echo $tableHeaders; ?>
            </thead>
            <?php
            $rows = array();
            foreach ($seos as $item) {
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
                    $item[$modelClass]['section'],
                    $item[$modelClass]['meta_title_es'],
                    $item[$modelClass]['meta_description_es'],
                    $item[$modelClass]['meta_keywords_es'],
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
