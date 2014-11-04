WhoopsCakephp
=============

This plugin integrates the Whoops library into your CakePHP application.

Requirements
------------

* CakePHP 3.0.x
* The actual [Whoops library](http://filp.github.io/whoops/) (automatically installed along with the plugin if Composer is used)

Installation
------------

The plugin should be installed using [Composer](https://getcomposer.org/).
The Plugin is available through the Packagist website. To install using composer, simply run:

```
php composer.phar require oldskool/whoops-cakephp:dev-cake3
```

Configuration
-------------

In order to start using Whoops as your error handler, you'll need to adjust your `config/bootstrap.php` file.

In your `config/bootstrap.php`, find the "use" statements at the top and append it with:

```php
use WhoopsCakephp\Error\WhoopsErrorHandler;
```

Next, find this bit:

```php
if ($isCli) {
	(new ConsoleErrorHandler(Configure::consume('Error')))->register();
} else {
	(new ErrorHandler(Configure::consume('Error')))->register();
}
```

Replace the content of the else clause with this:

```php
if (Configure::read('debug')) {
	(new WhoopsErrorHandler())->register();
} else {
	(new ErrorHandler(Configure::consume('Error')))->register();
}
```

This will set Whoops as the error and exception handler when debug mode is enabled. So all put together it should then look like:

```php
if ($isCli) {
	(new ConsoleErrorHandler(Configure::consume('Error')))->register();
} else {
	if (Configure::read('debug')) {
		(new WhoopsErrorHandler())->register();
	} else {
		(new ErrorHandler(Configure::consume('Error')))->register();
	}
}
```

If you want to use Whoops all the time, regardless of the debug setting of the application (not recommended), just replace the original `(new ErrorHandler(Configure::consume('Error')))->register();` with `(new WhoopsErrorHandler())->register();`. Please note that this will enable Whoops for all your end users, includign the stack traces and such. So be very cautious with this and only use it when you're very sure!
