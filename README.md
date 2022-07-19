File manager
====
file manager

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist plusser/yii2-file-manager "*"
```

or add

```
"plusser/yii2-file-manager": "*"
```

to the require section of your `composer.json` file.

Simple configuration:

1. Add fileManager module to your web and console config.

```
[
  ...
    'bootstrap' => [ ..., 'fileManager', ]
    'modules' => [
      ...
        'fileManager' => [
            'class' => 'fileManager\Module',
        ],
      ...
    ],
  ...
]
```
2. Run migrations:

```
php yii migrate/up

```
