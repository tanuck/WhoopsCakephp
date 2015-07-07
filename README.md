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
php composer.phar require oldskool/whoops-cakephp:~2.0
```

Configuration
-------------

In order to start using Whoops as your error handler, you'll need to adjust your `config/app.php` file and have it load the Plugin.

Find this bit of code:

```php
if (Configure::read('debug')) {
	Plugin::load('DebugKit', ['bootstrap' => true]);
}
```

And replace it with this:

```php
if (Configure::read('debug')) {
    Plugin::load('DebugKit', ['bootstrap' => true]);
    Plugin::load('WhoopsCakephp', ['bootstrap' => true]);
}
```

If you want to use Whoops all the time, regardless of the debug setting of the application (not recommended),
then just add the line `Plugin::load('WhoopsCakephp', ['bootstrap' => true]);` anywhere outside the if-statement.

Please note that this will enable Whoops for all your end users, including the stack traces and such.
So be very cautious with this and only use it when you're very sure!
