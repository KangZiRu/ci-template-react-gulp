<?php defined('BASEPATH') OR die('No direct script access is allowed!');


/**
 * Name of the app
 * 
 * This is will be used by title.
 * Though you can set title to display below
 */
$config['app_name'] = '';


/**
 * Current version of the app
 * 
 * This is to ensure that the browser won't load older version files
 */
$config['app_version'] = '1.0.0';


/**
 * Suffix for the app title
 * 
 * Leave this to empty if you don't want to use any prefix
 */
$config['title_prefix'] = '';


/**
 * Prefix for the app title
 * 
 * Leave this to empty if you don't want to use any suffix
 */
$config['title_suffix'] = ' - '.$config['app_name'];


/**
 * Directory of the resource files
 * 
 * The value MUST be in relative path
 */
$config['res_dir'] = 'res/';


/**
 * Directory of the image resource
 * 
 * The value MUST be in relative path
 */
$config['img_dir'] = $config['res_dir'].'img/';


/**
 * Directory of the Javascript resources
 * 
 * The value MUST be in relative path
 */
$config['js_dir'] = $config['res_dir'].'js/';


/**
 * Direvtory of the CSS resources
 * 
 * The value MUST be in relative path
 */
$config['css_dir'] = $config['res_dir'].'css/';


/**
 * Directory of the uploads repository
 * 
 * The value MUST be in relative path
 */
$config['upload_dir'] = 'uploads';
