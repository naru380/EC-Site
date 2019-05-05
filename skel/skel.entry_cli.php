<?php
/**
 *  {$action_name}.php
 *
 *  @author     {$author}
 *  @package    Sample
 */
chdir(dirname(__FILE__));
require_once '{$dir_app}/Sample_Controller.php';

ini_set('max_execution_time', 0);

Sample_Controller::main_CLI('Sample_Controller', '{$action_name}');
