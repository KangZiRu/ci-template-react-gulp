<?php ! defined('HEADER_INCLUDED') OR die('You can\'t include this file twice!');

define('HEADER_INCLUDED', TRUE);
?>


<!DOCTYPE html>

<html lang="en-US">

    <head>
        <title><?php echo $title ?></title>

        <meta charset="utf-8" />
        <meta name="author" content="Prasna Lukito" />
        <meta name="description" content="Business app learning using PHP CodeIgniter and ReactJS" />


        <link rel="stylesheet" href="<?php echo base_url() ?>res/jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>res/timepicker-addon/timepicker.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>res/anderlyne/anderlyne.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>res/css/header.css<?php echo $version_query ?>">
        <link rel="stylesheet" href="<?php echo base_url() ?>res/css/main.css<?php echo $version_query ?>">
        <link rel="stylesheet" href="<?php echo base_url() ?>res/css/footer.css<?php echo $version_query ?>">

        <?php if (count($css) > 0): ?>
            <?php foreach ($css as $css_file): ?>
                <link rel="stylesheet" href="<?php echo base_url().'res/css/'.$css_file.'.css'.$version_query ?>">
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
