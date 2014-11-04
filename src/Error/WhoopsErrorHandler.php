<?php
namespace WhoopsCakephp\Error;

use Cake\Core\Configure;
use Cake\Error\BaseErrorHandler;

class WhoopsErrorHandler extends BaseErrorHandler {

	public function _displayError($error, $debug) {
		$Whoops = new \Whoops\Run();
		$Whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
		return $Whoops->handleError(Configure::read('Error.errorLevel'), $error);
	}

	public function _displayException($exception) {
		$Whoops = new \Whoops\Run();
		$Whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
		return $Whoops->handleException($exception);
	}

}
