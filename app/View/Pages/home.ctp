<?php
if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>

<?php
if (Configure::read('debug') > 0):
	Debugger::checkSecurityKeys();
endif;
?>
<p>
<?php
	if (version_compare(PHP_VERSION, '5.2.8', '>=')):
		echo '<span class="notice success">';
			echo 'Su versión de PHP es 5.2.8 o superior';
		echo '</span>';
	else:
		echo '<span class="notice">';
			echo 'Su versión de PHP es demasiado baja. Usted necesita PHP 5.2.8 o superior para utilizar CakePHP.';
		echo '</span>';
	endif;
?>
</p>
<p>
	<?php
		if (is_writable(TMP)):
			echo '<span class="notice success">';
				echo 'Su directorio tmp tiene permisos de escritura.';
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo 'Su directorio tmp NO tiene permisos de escritura';
			echo '</span>';
		endif;
	?>
</p>
<p>
	<?php
		$settings = Cache::settings();
		if (!empty($settings)):
			echo '<span class="notice success">';
				echo 'El <em>FileEngine</em> está siendo utilizado para el almacenamiento en caché de núcleo. Para cambiar la configuración edite el archivo APP/config/core.php';
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo 'Su cache NO está funcionando. Por favor verifique las configuraciones en APP/Config/core.php';
			echo '</span>';
		endif;
	?>
</p>
<p>
	<?php
		$filePresent = null;
		if (file_exists(APP . 'Config' . DS . 'database.php')):
			echo '<span class="notice success">';
				echo 'Su archivo de configuración de base de datos existe.';
				$filePresent = true;
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo 'Su archivo de configuración de base de datos NO existe.';
			echo '</span>';
		endif;
	?>
</p>
<?php
if (isset($filePresent)):
	App::uses('ConnectionManager', 'Model');
	try {
		$connected = ConnectionManager::getDataSource('default');
	} catch (Exception $connectionError) {
		$connected = false;
		$errorMsg = $connectionError->getMessage();
		if (method_exists($connectionError, 'getAttributes')):
			$attributes = $connectionError->getAttributes();
			if (isset($errorMsg['message'])):
				$errorMsg .= '<br />' . $attributes['message'];
			endif;
		endif;
	}
?>
<p>
	<?php
		if ($connected && $connected->isConnected()):
			echo '<span class="notice success">';
				echo 'CakePHP está conectado con la base de datos.';
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo 'CakePHP NO puede conectarse a la base de datos.';
				echo '<br /><br />';
				echo $errorMsg;
			echo '</span>';
		endif;
	?>
</p>
<?php endif; ?>

<p>
	<?php
		if (CakePlugin::loaded('DebugKit')):
			echo '<span class="notice success">';
				echo 'DebugKit plugin está instalado';
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo 'DebugKit plugin NO está instalado. Le ayudará a inspeccionar y depurar diferentes aspectos de su aplicación';
				echo '<br/>';
				echo 'Puede instalarlo desde ' .$this->Html->link('GitHub', 'https://github.com/cakephp/debug_kit');
			echo '</span>';
		endif;
	?>
</p>
