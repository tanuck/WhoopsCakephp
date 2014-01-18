<?php
/**
 * Load our custom ExceptionHandler
 */
App::uses('WhoopsExceptionHandler', 'CakeWhoops.Lib/Error');
Configure::write('Exception.handler', 'WhoopsExceptionHandler::handle');
