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
        

        <script src="http://localhost:35729/livereload.js?snipver=1"></script>
        <script>
            Object.defineProperty(window, 'base', {
                enumerable: false,
                configurable: false,
                writable: false,
                value: "<?php echo base_url() ?>"
            });
        </script>

        <script src="<?php echo base_url() ?>res/anderlyne/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url() ?>res/anderlyne/anderlyne.js"></script>
        <script src="<?php echo base_url() ?>res/js/script.js"></script>

        <?php if (count($js) > 0): ?>
            <?php foreach($js as $js_file): ?>
                <script src="<?php echo base_url() ?>res/js/<?php echo $js_file ?>.js"></script>
            <?php endforeach; ?>
        <?php endif; ?>
    </body>
</html>
