<?php
/**
 * Created by PhpStorm.
 * User: Hani
 * Date: 9/25/2015
 * Time: 2:51 AM
 */

namespace backend\controllers\api\v1;

use yii\rest\ActiveController;

class CountryController extends ActiveController {
    public $modelClass = 'backend\models\Country';
}