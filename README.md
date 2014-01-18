WhoopsCake
==========

This plugin integrates the Whoops library into CakePHP.

Requirements
------------

* CakePHP 2.x
* The actual [Whoops library](http://filp.github.io/whoops/) (automatically installed along with the plugin if Composer is used)

Installation
------------

**Using Composer (recommended)**

The easiest way to install the Plugin is by using [Composer](https://getcomposer.org/).
The Plugin is available through the Packagist website. To install using composer, simply run:

```
php composer.phar require oldskool/cakephp-whoops:dev-master
```

**Manual**

To manually install the plugin, clone the repository into your `app/Plugin` directory:

```
# cd app/Plugin
# git clone git://github.com/oldskool/WhoopsCake.git
```

Finally, load the plugin from your `app/Config/bootstrap.php`, by adding the following line:

```php
CakePlugin::load('WhoopsCake', array('bootstrap' => true));
```

Configuration
-------------

Once you installed the plugin, you will need to configure it's exception handler as the default exception handler for your application.
Open `app/Config/core.php` and look for this code (it may be commented out, uncomment it if that is the case):

```php
Configure::write('Exception', array(
    'handler' => 'ErrorHandler::handleException',
    'renderer' => 'ExceptionRenderer',
    'log' => true
));
```

Change the `handler` value to `WhoopsCake.WhoopsExceptionHandler::handle`, which should give you a config like this:

```php
Configure::write('Exception', array(
    'handler' => 'WhoopsCake.WhoopsExceptionHandler::handle',
    'renderer' => 'ExceptionRenderer',
    'log' => true
));
```

Optionally, you can change the minimum debug level required before the Whoops libary kicks in.
By default, Whoops shows full stack traces and code excerpts. This is awesome for debugging, but not meant for your end users.
Therefor, the plugin by default requires at least a CakePHP debug level of 1, anything lower will be passed on to the default ErrorHandler.
If you are certain you want to adjust the minimum level, you can adjust the `$minDebugLevel` value in the `Lib/Error/WhoopsExceptionHandler.php` file.
**CAUTION:** Setting this to 0 means that the full exception details will always be shown, whether debug is enabled or not.
