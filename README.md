PHPLine
=======
**PHPLine** is a PHP class that allow you to execute commands through PHP script.

Installation
------------

The recommended way to install PHPLine is through composer.

Just create a `composer.json` file for your project:

``` json
{
	"require": {
		"khal3d/phpline": "*"
	}
}
```

And run these two commands to install it:

``` bash
$ wget http://getcomposer.org/composer.phar
$ php composer.phar install
```

Now you can add the autoloader, and you will have access to the library:

``` php
<?php
include 'vendor/autoload.php';
```

If you don't use **Composer** in your application, just
include the class file:

``` php
<?php
include_once( 'src/PHPLine/PHPLine.php' );
$PHPLine = new PHPLine\PHPLine();
```

You're done!

Usage
-----

example
``` php
$PHPLine = new PHPLine\PHPLine();
print_r($PHPLine->run('ls -al'));
```

another example:
``` php
$PHPLine = new PHPLine\PHPLine();
$PHPLine->run('ping google.com', TRUE);
```

Credits
-----
Khaled Attia. [@khal3d](https://twitter.com/khal3d).

License
------------
This project is released under [GPL v3 license](LICENSE).


Please free to contact me if you have any question.
