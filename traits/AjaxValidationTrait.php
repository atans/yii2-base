<?php

namespace atans\base\traits;

use Yii;
use yii\base\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;

trait AjaxValidationTrait
{
    /**
     * Performs ajax validation.
     *
     * @param Model $model
     *
     * @throws \yii\base\ExitException
     */
    protected function performAjaxValidation(Model $model)
    {
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            echo json_encode(ActiveForm::validate($model), JSON_UNESCAPED_UNICODE);
            Yii::$app->end();
        }
    }
}
