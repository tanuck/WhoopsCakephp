<?php
App::import('Vendor', 'filp/whoops/src/Whoops/Run');
App::import('Vendor', 'filp/whoops/src/Whoops/Exception/ErrorException');
App::import('Vendor', 'filp/whoops/src/Whoops/Exception/Formatter');
App::import('Vendor', 'filp/whoops/src/Whoops/Exception/Frame');
App::import('Vendor', 'filp/whoops/src/Whoops/Exception/FrameCollection');
App::import('Vendor', 'filp/whoops/src/Whoops/Exception/Inspector');
App::import('Vendor', 'filp/whoops/src/Whoops/Handler/HandlerInterface');
App::import('Vendor', 'filp/whoops/src/Whoops/Handler/Handler');
App::import('Vendor', 'filp/whoops/src/Whoops/Handler/PrettyPageHandler');
App::import('Vendor', 'filp/whoops/src/Whoops/Util/Misc');
App::import('Vendor', 'filp/whoops/src/Whoops/Util/TemplateHelper');

/**
 * The WhoopsErrorHandler will pass our errors to the Whoops library.
 * Errors will then be shown on a "Pretty Page", including the code excerpt
 * where the error occured along with an interactive stack trace.
 *
 * @author Jan Dorsman
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */
class WhoopsErrorHandler {

/**
 * This integer sets the minimum debug level required.
 *
 * If your CakePHP debug level is lower than this integer, the default ExceptionHandler is used.
 * The Whoops library provides a lot of information that you'd normally not want to share with
 * your end users (like code excerpts and server details). So make sure not to set this value too low.
 *
 * @var int
 */
	public static $minDebugLevel = 1;

/**
 * This method will handle any error occured.
 *
 * @param Exception $exception The exception to be handled
 *
 * @return void
 */
	public static function handle($code, $description, $file = null, $line = null, $context = null) {
		// Verify if the debug level is at least the minDebugLevel
		if (Configure::read('debug') >= self::$minDebugLevel) {
			// Debug level is high enough, use the Whoops handler
			$Whoops = new Whoops\Run();
			$Whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
			$Whoops->handleError($code, $description, $file, $line);
		} else {
			// Debug level is too low, fall back to CakePHP default ErrorHandler
			ErrorHandler::handleError($code, $description, $file, $line);
		}
	}

}
