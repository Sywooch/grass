<?php

namespace app\controllers;

use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\filters\AccessControl;

class AdminController extends Controller
{
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ]);
    }

    public function actionIndex()
    {
        $menu = [];

        foreach (\Yii::$app->modules as $module) {
            if (is_array($module)) {
                $module = $module['class'];
            }
            if (method_exists($module, 'getAdminLinks')) {
                $menu = ArrayHelper::merge($menu, $module::getAdminLinks());
            }

        }
        return $menu;
    }


}