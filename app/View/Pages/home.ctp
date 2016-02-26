<ul>
	
	<?php foreach ($carros as $carro) { ?>
		<li>
			<h1><?php echo $carro['Car']['name'] ?></h1>
			<p><?php echo $carro['Car']['text'] ?></p>
			<?php echo $this->Html->image('uploads/'.$carro['Car']['picture'], ['width'=>200]) ?>


			<?php echo $this->Html->link('Ampliar',[
			'action'=>'ampliacion', 
			'controller' => 'pages',
			'id'=>$carro['Car']['id'],
			'name' =>  strtolower(Inflector::slug($carro['Car']['name']))
			]) ?>
		</li>
	<?php } ?>

</ul>