<?php

require_once dirname(__FILE__) . '/../app/Sample_Controller.php';

/**
 * If you want to enable the UrlHandler, comment in following line,
 * and then you have to modify $action_map on app/Sample_UrlHandler.php .
 *
 */
// $_SERVER['URL_HANDLER'] = 'index';

/**
 * Run application.
 */
Sample_Controller::main('Sample_Controller', 'index');

