WhoopsCakephp
=============

This plugin integrates the Whoops library into your CakePHP application.

Requirements
------------

* CakePHP 2.x
* The actual [Whoops library](http://filp.github.io/whoops/) (automatically installed along with the plugin if Composer is used)

Installation
------------

### Using Composer (recommended)

The easiest way to install the Plugin is by using [Composer](https://getcomposer.org/).
The Plugin is available through the Packagist website. To install using composer, simply run:

```
php composer.phar require oldskool/whoops-cakephp:dev-master
```

### Manual

To manually install the plugin, clone the repository into your `app/Plugin` directory:

```
# cd app/Plugin
# git clone git@github.com:oldskool/WhoopsCakephp.git
```

Also place a copy of the Whoops library in your Vendor folder.

```
# mkdir app/Vendor/filp
# cd app/Vendor/filp
# git clone git@github.com:filp/whoops.git
```

Configuration
-------------

Load the plugin by adding the following line to `app/Config/bootstrap.php`:

```php
CakePlugin::load('WhoopsCakephp', array('bootstrap' => true));
```

That is all you need to get the plugin up and running! Whoops will now be your default error, and exception handler.
Make sure that you load the plugin at the bottom of your bootstrap, at least after the `Exception` Configuration key is defined (the Plugin should override the `handler` key of the `Exception` configuration key). The same goes for the `Error` configuration key.

Optionally, you can change the minimum debug level required before the Whoops library kicks in.
By default, Whoops shows full stack traces and code excerpts. This is awesome for debugging, but not meant for your end users.
Therefor, the plugin by default requires at least a CakePHP debug level of 1, anything lower will be passed on to the default ErrorHandler.
If you are certain you want to adjust the minimum level, you can adjust the `$minDebugLevel` value in the `Lib/Error/WhoopsExceptionHandler.php`, or `Lib/Error/WhoopsExceptionHandler.php` file respectively.

**CAUTION:** Setting this to 0 means that the full exception details will always be shown, whether debug is enabled or not.
