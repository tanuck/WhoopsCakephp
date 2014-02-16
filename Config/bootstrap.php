<?php
/**
 * Load our custom ExceptionHandler
 */
App::uses('WhoopsExceptionHandler', 'WhoopsCakephp.Lib/Error');
Configure::write('Exception.handler', 'WhoopsExceptionHandler::handle');
