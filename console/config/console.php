<?php
return [
    'id' => 'console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'console\controllers',
    'modules' => [
        'podium' => 'common\modules\forum\Podium',
    ],
    'controllerMap' => [
        'translate' => [
            'class' => common\modules\i18n\commands\TranslatemanagerController::className(),
        ],
        'command-bus' => [
            'class' => trntv\bus\console\BackgroundBusController::class,
        ],
        'migrate' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/migrations/db',
            'migrationTable' => '{{%system_db_migration}}'
        ],
        'rbac-migrate' => [
            'class' => console\controllers\RbacMigrateController::class,
            'migrationPath' => '@common/migrations/rbac/',
            'migrationTable' => '{{%system_rbac_migration}}',
            'templateFile' => '@common/rbac/views/migration.php'
        ],
    ],
];
