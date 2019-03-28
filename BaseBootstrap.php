<?php

namespace atans\base;

use Yii;
use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

/**
 * Class BaseBootstrap
 *
 * @package atans\base
 * @property boolean isConsole
 * @property boolean isFrontend
 * @property boolean isBackend
 */
abstract class BaseBootstrap implements BootstrapInterface
{
    /**
     * 檢查是否前臺
     *
     * @return bool
     */
    public function getIsConsole()
    {
        return Yii::$app->id === 'app-console';
    }

    /**
     * 檢查是否前臺
     *
     * @return bool
     */
    public function getIsFrontend()
    {
        return Yii::$app->id === 'app-frontend';
    }

    /**
     * 檢查是否後臺
     *
     * @return bool
     */
    public function getIsBackend()
    {
        return Yii::$app->id === 'app-backend';
    }

    /**
     * 注册语言包, 防止报错
     *
     * @param string $name
     * @param string $basePath
     * @param array $extra
     */
    public function registerTranslations($name, $basePath, array $extra = [])
    {
        if (! isset(Yii::$app->i18n->translations[$name])) {
            Yii::$app->i18n->translations[$name] = ArrayHelper::merge([
                'class'          => 'yii\i18n\PhpMessageSource',
                'basePath'       => $basePath,
                'sourceLanguage' => 'en',
            ], $extra);
        }
    }
}
