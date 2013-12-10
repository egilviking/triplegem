<?php
/**
 * Site configuration, this file is changed by user per site.
 *
 */

/**
 * Set level of error reporting
 */
error_reporting(-1);
ini_set('display_errors', 1);


/**
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$tg->config['debug']['TripleGemCore'] = false;
$tg->config['debug']['session'] = false;
$tg->config['debug']['timer'] = true;
$tg->config['debug']['db-num-queries'] = true;
$tg->config['debug']['db-queries'] = true;


/**
 *	Filter options
 */
$tg->config['filter']['use'] = true; 
$tg->config['filters'] = array(
	'bbcode'   => 'bbcode2html',
	'link'     => 'make_clickable',
	'markdown' => 'markdown',
	'nl2br'    => 'get_nl2br', 
); 


/**
 * Set database(s).
 */
$tg->config['database'][0]['dsn'] = 'sqlite:' . TRIPLEGEM_SITE_PATH . '/data/.ht.sqlite';


/**
 * What type of urls should be used?
 * 
 * default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
$tg->config['url_type'] = 1;


/**
 * Set a base_url to use another than the default calculated
 */
$tg->config['base_url'] = null;


/**
 * How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
 */
$tg->config['hashing_algorithm'] = 'sha1salt';


/**
 * Allow or disallow creation of new user accounts.
 */
$tg->config['create_new_users'] = true;


/**
 * Define session name
 */
$tg->config['session_name'] = preg_replace('/[:\.\/-_]/', '', __DIR__);
$tg->config['session_key']  = 'TripleGemCore';


/**
 * Define default server timezone when displaying date and times to the user. All internals are still UTC.
 */
$tg->config['timezone'] = 'Europe/Stockholm';


/**
 * Define internal character encoding
 */
$tg->config['character_encoding'] = 'UTF-8';


/**
 * Define language
 */
$tg->config['language'] = 'en';


/**
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example: 
 * the url 'developer/dump' would instantiate the controller with the key "developer", that is 
 * CCDeveloper and call the method "dump" in that class. This process is managed in:
 * $tg->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
$tg->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
  'content'   => array('enabled' => true,'class' => 'CCContent'),
  'blog'      => array('enabled' => true,'class' => 'CCBlog'),
  'page'      => array('enabled' => true,'class' => 'CCPage'),
  'user'      => array('enabled' => true,'class' => 'CCUser'),
  'acp'       => array('enabled' => true,'class' => 'CCAdminControlPanel'),
);

/**
 * Settings for the theme.
 */
$tg->config['theme'] = array(
  // The name of the theme in the theme directory
  'name'    => 'core', 
);
