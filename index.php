<?php
//
// PHASE: BOOTSTRAP
//
define('TRIPLEGEM_INSTALL_PATH', dirname(__FILE__));
define('TRIPLEGEM_SITE_PATH', TRIPLEGEM_INSTALL_PATH . '/site');

require(TRIPLEGEM_INSTALL_PATH.'/src/CTripleGem/bootstrap.php');

$triplegem = CTripleGem::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$triplegem->FrontControllerRoute();


//
// PHASE: THEME ENGINE RENDER
//
$triplegem->ThemeEngineRender();
