CakeWhoops
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
php composer.phar require oldskool/cake-whoops:dev-master
```

**Manual**

To manually install the plugin, clone the repository into your `app/Plugin` directory:

```
# cd app/Plugin
# git clone git@github.com:oldskool/CakeWhoops.git
```

Also place a copy of the Whoops library in your Vendor folder.

```
# mkdir app/Vendor/filp
# cd app/Vendor/filp
# git clone git@github.com:filp/whoops.git
```

Please note that if you do a manual install, you will need to place an autoloader (like the [PSR-4 autoloader](http://www.php-fig.org/psr/psr-4/)) in `app/Vendor/autoload.php`.
Otherwise, the Whoops classes won't be properly loaded.

Configuration
-------------

Load the plugin by adding the following line to `app/Config/bootstrap.php`:

```php
CakePlugin::load('CakeWhoops', array('bootstrap' => true));
```

That is all you need to get the plugin up and running! Whoops will now be your default exception handler.

Optionally, you can change the minimum debug level required before the Whoops libary kicks in.
By default, Whoops shows full stack traces and code excerpts. This is awesome for debugging, but not meant for your end users.
Therefor, the plugin by default requires at least a CakePHP debug level of 1, anything lower will be passed on to the default ErrorHandler.
If you are certain you want to adjust the minimum level, you can adjust the `$minDebugLevel` value in the `Lib/Error/WhoopsExceptionHandler.php` file.

**CAUTION:** Setting this to 0 means that the full exception details will always be shown, whether debug is enabled or not.
