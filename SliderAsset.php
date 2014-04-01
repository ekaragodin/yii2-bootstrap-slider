<?php
/**
 * @author Evgeniy Karagodin (ekaragodin@gmail.com)
 */

namespace ekaragodin\bootstrap;


use yii\web\AssetBundle;

class SliderAsset extends AssetBundle {
    public $sourcePath = __DIR__;
    public $css = [
        'slider.css',
    ];
    public $js = [
        'bootstrap-slider.js'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
} 