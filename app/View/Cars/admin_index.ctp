<?php 
if (empty($modelClass)) {
    $modelClass = Inflector::singularize($this->name);
}
?> 
<h2 class="hidden-desktop">Carros</h2>




<div class="row">
    <div class="col-xs-12">

        <div class="panel">
        <div class="span12 actions">
    <?php echo $this->Html->link('Nuevo Carro', ['action' => 'add'], ['class' => 'btn btn-success']); ?>
        </div>
        <div class="panel-body pn">
            <div class="table-responsive">
                <table class="table footable" data-page-navigation=".pagination" data-page-size="10">
                        <thead>
                        <tr class="bg-light">
                            <th>id</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Texto</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($carros as $item) { ?>
                            <tr>
                                <td class=""><?php echo $item[$modelClass]['id'] ?></td>
                                <td>
<?php echo  $this->Html->image('uploads/'.$item[$modelClass]['picture'], ['class'=>'img-responsive', 'width'=>100]) ?>
                                </td>
                                <td class=""><?php echo $item[$modelClass]['name'] ?> </td>
                                <td class=""><?php echo $item[$modelClass]['category'] ?> </td>
                                <td class=""><?php echo $item[$modelClass]['text'] ?> </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button type="button"
                                                class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false"> Acciones
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
 <a href="<?php echo $this->Html->url(array('action' => 'edit', $item[$modelClass]['id'])) ?>">Editar</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $this->Html->url(array('action' => 'delete', $item[$modelClass]['id'])) ?>">Borrar</a>
                                            </li> 
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                         <tfoot class="footer-menu">
                                <tr>
                                    <td colspan="5">
                                        <nav class="text-right">
                                            <ul class="pagination hide-if-no-paging"></ul>
                                        </nav>
                                    </td>
                                </tr>
                                </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


