<?php ! defined('FOOTER_INCLUDED') OR die('You can\'t include this file twice!');

define('FOOTER_INCLUDED', TRUE);
?>
 
 
        </main>

        <?php
        if ($template_location === 'after')
        {
            foreach ($template as $tmpl)
            {
                $this->load->view('templates/'.$tmpl);
            }
        }


        if ($footer !== FALSE)
        {
            $this->load->view('templates/'.$footer);
        }
        ?>
        
        <?php if (ENVIRONMENT === 'production') ?>
        <script src="http://localhost:35729/livereload.js?snipver=1"></script>

        <script>
            Object.defineProperty(window, 'base', {
                enumerable: false,
                configurable: false,
                writable: false,
                value: "<?php echo base_url() ?>"
            });
        </script>

        <script src="<?php echo base_url() ?>res/js/react.min.js"></script>
        <script src="<?php echo base_url() ?>res/js/react-dom.min.js"></script>
        <script src="<?php echo base_url() ?>res/js/react-dom-server.min.js"></script>

        <script src="<?php echo base_url() ?>res/anderlyne/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url() ?>res/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>res/timepicker-addon/timepicker.js"></script>
        <script src="<?php echo base_url() ?>res/anderlyne/anderlyne.js"></script>
        <script src="<?php echo base_url().'res/js/script.js'.$version_query ?>"></script>

        <?php if (count($js) > 0): ?>
            <?php foreach($js as $js_file): ?>
                <script src="<?php echo base_url().'res/js/'.$js_file.'.js'.$version_query ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
    </body>
</html>
