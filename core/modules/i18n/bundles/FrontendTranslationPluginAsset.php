<?php

namespace core\modules\i18n\bundles;

use yii\web\AssetBundle;

/**
 * Contains javascript files necessary for modify translations on the live site (frontend translation).
 *
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.2
 */
class FrontendTranslationPluginAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@core/modules/i18n/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'javascripts/helpers.js',
        'javascripts/frontend-translation.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'core\modules\i18n\bundles\TranslationPluginAsset',
    ];
}
