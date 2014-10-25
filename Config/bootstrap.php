<?php
/**
 * Load our custom ExceptionHandler
 */
App::uses('WhoopsExceptionHandler', 'WhoopsCakephp.Lib/Error');
App::uses('WhoopsErrorHandler',     'WhoopsCakephp.Lib/Error');

Configure::write('Exception.handler', 'WhoopsExceptionHandler::handle');
Configure::write('Error.handler',     'WhoopsErrorHandler::handle');
