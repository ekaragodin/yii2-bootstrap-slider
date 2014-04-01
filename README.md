Bootstrap Slider
================
Bootstrap slider control

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ekaragodin/yii2-bootstrap-slider "*"
```

or add

```
"ekaragodin/yii2-bootstrap-slider": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= Slider::widget([
        'name' => 'price',
        'value' => $model->price,
        'options' => [
            'data' => [
                'slider-min' => 100,
                'slider-max' => 1000,
            ],
        ],
    ]) ?>
```