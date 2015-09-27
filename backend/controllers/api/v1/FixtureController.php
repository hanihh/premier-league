<?php
/**
 * Created by PhpStorm.
 * User: Hani
 * Date: 9/25/2015
 * Time: 3:37 AM
 */

namespace backend\controllers\api\v1;

use yii\rest\ActiveController;

class FixtureController extends ActiveController {
    public $modelClass = 'backend\models\Fixture';
}