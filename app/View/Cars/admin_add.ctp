<?php 
if (empty($modelClass)) {
    $modelClass = Inflector::singularize($this->name);
}
?> 

<div class="allcp-form theme-primary">
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">Agregar Carro
            </div>
        </div>
        <div class="panel-body">
            <?php echo $this->Form->create($modelClass, array('type'=>'file'));?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="section">
                            <label class="field">                                
                                <?php
                                    echo $this->Form->input('name', array(
                                        'class' => 'gui-input',
                                        'placeholder' => 'Nombre',
                                        'div' => false,
                                        'label' => false,
                                    ));
                                ?>
                            </label>
                        </div>
                    </div>




                    <div class="col-md-12">
                        <div class="section">
                            <label class="field">                                
                                <?php
                                    echo $this->Form->input('category', array(
                                        'class' => 'gui-input',
                                        'placeholder' => 'Categoria',
                                        'div' => false,
                                        'type' => 'text',
                                        'label' => false,
                                    ));
                                ?>
                            </label>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="section">
                            <label class="field">                                
                                <?php
                                    echo $this->Form->input('text', array(
                                        'class' => 'gui-input',
                                        'placeholder' => 'Texto',
                                        'div' => false,
                                        
                                        'label' => false,
                                    ));
                                ?>
                            </label>
                        </div>
                    </div>


                     <div class="col-md-12">
                        <div class="section">
                            <label class="field">                                
                                <?php
                                    
                                    echo $this->Form->input('picture', array(
                                        'class' => 'gui-input',
                                        'div' => false,
                                        'type' => 'file',
                                        'label' => false,
                                    ));
                                    
                                ?>
                            </label>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="section">
                        <?php echo $this->Form->button('Guardar', array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
                        </div>
                    </div>


                </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>


