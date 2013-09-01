# rabbitmq-producer #

## About ##

Main purpose of this code is present how to produce messages into RabbitMQ via PHP.

## Requirements ##

1. Access to [RabbitMQ server](http://www.rabbitmq.com/download.html)
2. [Composer](http://getcomposer.org/download/)
3. PHP >= 5.4 (only if You want to quick deploy via PHP built-in server)

## Deployment ##

Clone this, navigate to cloned repo and install required vendors via Composer: 

```bash
$ composer.phar install
```

Make sure that RabbitMQ is running on localhost. In other hand You have to change ```AMQPConnection``` constructor params placed in ```produce.php``` file

```php
$connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
```

Optionally navigate to root of cloned repo and launch:

```bash
$ php -S localhost:8000
```

If You already have installed web server (like [nginx](http://wiki.nginx.org/Main) or [apache](http://httpd.apache.org/)) just configure new vhost pointing to cloned root dir

Navigate to ```localhost:8000``` in Your web browser and start producing messages.
