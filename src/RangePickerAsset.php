<?php

namespace sadi01\dateRangePicker;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Sadegh Shafii <sadshafiei.01@gmail.com>
 */
class RangePickerAsset extends AssetBundle
{
	public static $extra_js = [];

	public function init() {
		Yii::setAlias('@daterangepicker', __DIR__);

		foreach (static::$extra_js as $js_file) {
			$this->js[]= $js_file;
		}

		return parent::init();
	}

	public $sourcePath = '@daterangepicker/assets/';

	public $css = [
        'css/daterangepicker.css',
        'css/datepicker-theme.css',
	];

	public $js = [
        'js/moment.min.js',
        'js/moment-jalaali.js',
        'js/daterangepicker-fa-ex.js',
	];

	public $depends = [
		'yii\bootstrap5\BootstrapPluginAsset',
	];
}
