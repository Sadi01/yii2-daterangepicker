Yii2 Bootstrap Date Time Range Picker
===========================
Persian date range picker for Yii2 framework.

This is the daterangepicker widget and a Yii 2 enhanced wrapper for the [daterangepicker](https://github.com/dangrossman/daterangepicker).

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run console command

```
composer require sadi01/yii2-daterangepicker "*"
```

Or add the package to the `require` section of your `composer.json` file:

```json
{
    "require": {
      "sadi01/yii2-daterangepicker": "*"
    }
}
```

then run `composer update`.

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= $form->field($model, 'date_range')->widget(dateRangePicker::classname(),[
	'options'  => [
		'format' => 'jYYYY/jMM/jDD',
		'viewformat' => 'jYYYY/jMM/jDD',
		// 'minDate' => '1394/10/17',
		'drops' => 'down',
		'placement' => 'right',
		'opens' => 'right',
		'language' => 'fa',
		'jalaali'=> true,
		'showDropdowns'=> true,
		'singleDatePicker' => false,
		'useTimestamp' => true,
		'locale'=> [
			'format'=> 'jYYYY/jMM/jDD'
		],
	],
	'htmlOptions' => [
		'class'	=> 'form-control',
		'id' => 'date_range',
		'autocomplete' => 'off'
	]
]);

?>
```

More Examples
-------------

Custom local:

```php
<?= $form->field($model, 'from_date')->widget(dateRangePicker::classname(),[
	'options'  => [
		'format' => 'jYYYY/jMM/jDD',
		'viewformat' => 'jYYYY/jMM/jDD',
		'drops' => 'down',
		'placement' => 'right',
		'opens' => 'right',
		'language' => 'fa',
		'jalaali'=> true,
		'showDropdowns'=> true,
		'singleDatePicker' => false,
		'useTimestamp' => true,
		'locale'=> [
			'format'=> 'jYYYY/jMM/jDD',
			'jalaali' => true,
			'separator'=> ' - ',
			'applyLabel'=> Yii::t('yii', 'Apply'),
			'cancelLabel' => Yii::t('yii', 'Cancel'),
			'fromLabel' => Yii::t('yii', 'From'),
			'toLabel' => Yii::t('yii', 'To'),
			'customRangeLabel' => 'Custom',
			'daysOfWeek'=> [
				'یک',
				'دو',
				'سه',
				'چهار',
				'پنج',
				'جمعه',
				'شنبه',
			],
			'monthNames'=> [
				'فروردین',
				'اردیبهشت',
				'خرداد',
				'تیر',
				'مرداد',
				'شهریور',
				'مهر',   
				'آبان',
				'آذر',
				'دی',
				'بهمن',
				'اسفند',
			],
			'firstDay' => 6
		],
	],
	'htmlOptions' => [
		'class'	=> 'form-control',
		'id' => 'from_date',
		'autocomplete' => 'off',
	]
]);

?>
```

Date Time Range Picker:

```php
<?= $form->field($model, 'date_time_range')->widget(dateRangePicker::classname(),[
	'options'  => [
		'drops' => 'down',
		'placement' => 'right',
		'opens' => 'left',
		'language' => 'fa',
		'jalaali'=> true,
		'showDropdowns'=> true,
		'singleDatePicker' => false,
		'useTimestamp' => true,
		'timePicker' => true,
		'timePicker24Hour' => true,
		'timePickerSeconds' => true,
		'locale'=> [
			'format' => 'jYYYY/jMM/jDD HH:mm:ss',
		],
	],
	'htmlOptions' => [
		'class'	=> 'form-control',
		'id' => 'date_time_range',
		'autocomplete' => 'off',
	]
]);

?>
```

Single Date Time Picker:

```php
<?= $form->field($model, 'from_date_time')->widget(dateRangePicker::classname(),[
	'options'  => [
		'drops' => 'down',
		'placement' => 'right',
		'opens' => 'left',
		'language' => 'fa',
		'jalaali'=> true,
		'showDropdowns'=> true,
		'singleDatePicker' => true,
		'useTimestamp' => true,
		'timePicker' => true,
		'timePicker24Hour' => true,
		'timePickerSeconds' => true,
		'locale'=> [
			'format' => 'jYYYY/jMM/jDD HH:mm:ss',
		],
	],
	'htmlOptions' => [
		'class'	=> 'form-control',
		'id' => 'from_date_time',
		'autocomplete' => 'off',
	]
]);

?>
```

Set `Min` and `Max` Date:

```php
<?= $form->field($model, 'date_range')->widget(dateRangePicker::classname(),[
	'options'  => [
		'minDate' => '1399/09/09',
		'maxDate' => '1401/01/01',
		'drops' => 'down',
		'placement' => 'right',
		'opens' => 'right',
		'language' => 'fa',
		'jalaali'=> true,
		'showDropdowns'=> true,
		'singleDatePicker' => false,
		'useTimestamp' => true,
		'locale'=> [
			'format'=> 'jYYYY/jMM/jDD'
		],
	],
	'htmlOptions' => [
		'class'	=> 'form-control',
		'id' => 'date_range',
		'autocomplete' => 'off'
	]
]);

?>
```