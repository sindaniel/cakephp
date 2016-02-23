<?php 
echo $this->Html->script(array('ckeditor/ckeditor.js'));
if (empty($modelClass)) {
    $modelClass = Inflector::singularize($this->name);
}
?> 
<?php echo $this->Form->create($modelClass);?>
<div class="allcp-form theme-primary">
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">Editar Texto » <?php echo $this->data['Section']['name']; ?>
            </div>
        </div>
        <div class="panel-body">
            <?php echo $this->Form->create($modelClass);?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="section">
                            <label class="field">                                
                                <?php
									echo $this->Form->input('id');
									echo $this->Form->input('name', array(
										'class' => 'gui-input',
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
									echo $this->Form->input('id');
									echo $this->Form->input('text_es', array(
										'class' => 'gui-input',
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
									echo $this->Form->input('id');
									echo $this->Form->input('text_es', array(
										'class' => 'gui-input',
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
						<?php echo $this->Form->button('Guardar', array('class' => 'btn btn-success')); ?>
						<?php echo $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
                    	</div>
                    </div>


                </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>


