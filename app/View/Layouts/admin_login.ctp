<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Administrador - <?php echo Configure::read('Site.title'); ?></title>
        <?php
        echo $this->Html->css(array(
            'theme',
            'forms',
        ));

        // echo $this->Html->script(array(
        //     'html5',
        // ));

        echo $this->fetch('script');
        echo $this->fetch('css');
        ?>
    </head>


<body class="utility-page sb-l-c sb-r-c">

<!-- -------------- Body Wrap  -------------- -->
<div id="main" class="animated fadeIn">

    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">

        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- -------------- Content -------------- -->
        <section id="content">

            <!-- -------------- Login Form -------------- -->
            <div class="allcp-form theme-primary mw320" id="login">
                <div class="text-center mb20">
                    <?php echo $this->Html->image('logokdm.png', array('class'=>'img-responsive')) ?>
                </div>
                <div class="panel mw320">
                    <?php
                        echo $this->Help->sessionFlash();
                        echo $this->fetch('content');
                    ?>
                </div>
                <!-- -------------- /Panel -------------- -->
            </div>
            <!-- -------------- /Spec Form -------------- -->

        </section>
        <!-- -------------- /Content -------------- -->

    </section>  
    <!-- -------------- /Main Wrapper -------------- -->

</div>
<!-- -------------- /Body Wrap  -------------- -->

<!-- -------------- Scripts -------------- -->

<!-- -------------- jQuery -------------- -->

<?php 
    echo $this->Html->script(array(
        'jquery-1.11.3.min',
        'jquery-ui.min',
        'canvasbg.js',
        'utility',
        'demo',
        'main'
    ));
?>

<!-- -------------- Page JS -------------- -->
<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Init CanvasBG
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 5,
                y: window.innerHeight / 10
            }
        });

    });
</script>

<!-- -------------- /Scripts -------------- -->

</body>




</html>