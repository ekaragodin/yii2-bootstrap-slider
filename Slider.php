<?php
/**
 * @author Evgeniy Karagodin (ekaragodin@gmail.com)
 *
 * See original js plugin http://www.eyecon.ro/bootstrap-slider/ for full documentation
 */

namespace ekaragodin\bootstrap;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

class Slider extends Widget {

    /**
     * @var string|string[]
     */
    public $name;

    /**
     * @var string|string[]
     */
    public $id;

    /**
     * @var float|float[]
     */
    public $value = 50;

    public function init() {
        parent::init();
        Html::addCssClass($this->options, 'slider');

        if (!is_array($this->value)) {
            $this->value = [$this->value];
        }

        if (!is_array($this->name)) {
            $this->name = [$this->name];
        }

        if (empty($this->id)) {
            $this->id = [];
        }

        if (!is_array($this->id)) {
            $this->id = [$this->id];
        }

        while (count($this->id) < count($this->name)) {
            $this->id[] = self::$autoIdPrefix . self::$counter++;
        }
    }

    public function run() {
        $options = $this->options;

        if (!isset($options['data'])) {
            $options['data'] = [];
        }

        $options['data']['slider-value'] = Json::encode($this->value);

        echo Html::textInput($this->name[0], '', $options);

        echo Html::hiddenInput($this->name[0], $this->value[0], ['id' => $this->id[0]]);

        if (count($this->id) > 1) {
            echo Html::hiddenInput($this->name[1], $this->value[1], ['id' => $this->id[1]]);
        }

        $slideStop = 'function () {' .
            'var value = $(this).data("slider").getValue();' .
            'var ids = ' . Json::encode($this->id) . ';' .
            '$("#" + ids[0]).val(ids.length > 1 ? value[0] : value);' .
            'if (ids.length > 1) {' .
                '$("#" + ids[1]).val(value[1]);' .
            '}' .
        '}';
        $this->getView()->registerJs("jQuery('#{$this->options["id"]}').on('slideStop', $slideStop);");
        SliderAsset::register($this->getView());
        $this->registerPlugin('slider');
    }
}