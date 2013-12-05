<?php
/**
* All requests routed through here. This is an overview of what actaully happens during
* a request.
*
* @package TripleGemCore
*/

// ---------------------------------------------------------------------------------------
//
// PHASE: BOOTSTRAP
//
define('TRIPLEGEM_INSTALL_PATH', dirname(__FILE__));
define('TRIPLEGEM_SITE_PATH', TRIPLEGEM_INSTALL_PATH . '/site');

require(TRIPLEGEM_INSTALL_PATH.'/src/bootstrap.php');

$tg = CTripleGem::Instance();


// ---------------------------------------------------------------------------------------
//
// PHASE: FRONTCONTROLLER ROUTE
//
$tg->FrontControllerRoute();


// ---------------------------------------------------------------------------------------
//
// PHASE: THEME ENGINE RENDER
//
$tg->ThemeEngineRender();
