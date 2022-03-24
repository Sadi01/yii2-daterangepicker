<?php

namespace sadi01\dateRangePicker;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Sadegh Shafii <sadshafiei.01@gmail.com>
 */
class FontAwesomeAsset extends AssetBundle
{
    // The files are not web directory accessible, therefore we need
    // to specify the sourcePath property. Notice the @vendor alias used.
    public $sourcePath = '@vendor/fortawesome/font-awesome';

    public $css = [
        'css/font-awesome.css',
    ];

    public $depends = [
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}