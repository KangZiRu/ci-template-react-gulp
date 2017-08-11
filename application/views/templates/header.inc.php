<!DOCTYPE html>

<html lang="en-US">

    <head>
        <title><?php echo $title ?></title>

        <meta charset="utf-8" />
        <meta name="author" content="Prasna Lukito" />
        <meta name="description" content="Business app learning using PHP CodeIgniter and ReactJS" />

        <link rel="stylesheet" href="<?php echo base_url() ?>res/anderlyne/anderlyne.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>res/css/style.css">

        <?php if (count($css) > 0): ?>
            <?php foreach ($css as $css_file): ?>
                <link rel="stylesheet" href="<?php echo base_url() ?>res/css/<?php echo $css_file ?>.css">
            <?php endforeach; ?>
        <?php endif; ?>
    </head>

    <?php
    if ($header !== FALSE)
    {
        $this->load->view('templates/'.$header);
    }

    if ($template_location === 'before')
    {
        foreach ($template as $tmpl)
        {
            $this->load->view('templates/'.$tmpl);
        }
    }
    ?>



    <main>
