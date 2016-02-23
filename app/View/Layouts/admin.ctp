<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Administrador - <?php echo Configure::read('Site.title'); ?></title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">

         <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
          type='text/css'>
        <?php


        echo $this->Html->css([
            'theme',
            'forms',
            'c3.min',
            'footable.core.min.css'
        ]);
        echo $this->Help->js();    
        echo $this->fetch('script');
        echo $this->fetch('css');

   
        ?>
    </head>
<body class="sales-stats-page">
<div id="main">
    <!-- -------------- Sidebar  -------------- -->
    <?php echo $this->element('admin/navigation'); ?>
    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">
                <!-- -------------- Products Status Table -------------- -->
                <?php echo $this->Help->sessionFlash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <!-- -------------- /Column Center -------------- -->
        </section>
        <!-- -------------- /Content -------------- -->
    </section>
</div>
    <?php
        echo $this->Html->script([
            'jquery-1.11.3.min',
            'jquery-ui.min',
            'footable.all.min',
            'footable.filter.min',
            'highcharts',
            'utility',
            'demo',
            'main'
        ]);
        echo $this->Blocks->get('scriptBottom');
        echo $this->Js->writeBuffer();
    ?>    
    <script>
        $(function(){
             $('.footable').footable();
        })
    </script>    
</body>
</html>