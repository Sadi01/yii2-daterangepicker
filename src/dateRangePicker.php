<?php
namespace sadi01\dateRangePicker;

use sadi01\dateRangePicker\RangePickerAsset;

use Yii;
use yii\base\Model;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\Widget as Widget;

/**
 * @author Sadegh Shafii <sadshafiei.01@gmail.com>
 */
class dateRangePicker extends Widget
{
	/**
	 * @var string $selector
	 */
	public $selector;
	/**
	 * @var string attribute associated with this widget.
	 */
	public $attribute;
	/**
	 * @var \yii\db\ActiveRecord model associated with this widget.
	 */
	public $model;
	/**
	 * @var string JS Callback for Daterange picker
	 */
	public $callback;
	/**
	 * @var array Options to be passed to daterange picker
	 */
	public $options = [];
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = [];
	/**
	 * @var string[] the JavaScript event handlers.
	 */
	public $events = [];

    /**
     * @var string the variable that will store additional options for daterangepicker to add enhanced features after the
     * plugin is loaded and initialized. This variable name will be stored as a data attribute `data-dateRangePicker-options`
     * within the base select input options.
     */
	protected $_dateRangePickerOptionsVar;

	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		//checks for the element id
		if (!isset($this->htmlOptions['id'])) {
			$this->htmlOptions['id'] = $this->getId();
		}
        if (isset($this->htmlOptions['class'])) {
            $this->htmlOptions['class'] .= ' has-datepicker';
        } else $this->htmlOptions['class'] = 'has-datepicker';

		parent::init();
	}

	/**
	 * Renders the widget.
	 */
	public function run()
	{
		$this->registerPlugin();
	}

	protected function registerPlugin()
	{
		if ($this->selector){
			$this->registerJs($this->selector, $this->options, $this->callback);
		}
		else {
			$id = $this->htmlOptions['id'];

            $this->_dateRangePickerOptionsVar = 'daterangepicckeroptions_' . hash('crc32', Json::encode($this->options));
            $this->htmlOptions['data-dateRange-options'] = $this->_dateRangePickerOptionsVar;

			echo Html::activeInput('text', $this->model, $this->attribute, $this->htmlOptions);
			$this->registerJs("#{$id}", "#{$id}-RemoveBtn", $this->options, $this->callback);
		}
	}

	protected function registerJs($selector, $removeBtn, $options, $callback)
	{
		$view = $this->getView();
		RangePickerAsset::register($view);
        $encodedOptions = Json::encode($options);
		$js   = [];
		$js[] = '$("' . $selector . '").daterangepicker("' . $removeBtn . '", ' . Json::encode($options) . ($callback ? ', ' . Json::encode($callback) : '') . ')';

		foreach ($this->events as $event => $handler)
			$js[] = ".on('{$event}', " . Json::encode($handler) . ")";

        $view->registerJs("var {$this->_dateRangePickerOptionsVar} = {$encodedOptions};", View::POS_HEAD);

		$view->registerJs(implode("\n", $js) . ';', View::POS_READY);
	}
}
