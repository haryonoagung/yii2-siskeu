<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

class FormatterController extends Controller
{
	public function actionIndex()
	{
		$appLang = Yii::$app->language = 'en';
		$formatter = Yii::$app->formatter;

		echo "<h2> {$appLang} </h2>";

		echo "<p> Desimal : {$formatter->asDecimal(1.000,3)}</p>";
	}
}
