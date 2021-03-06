<?php

use app\components\Migration;
use app\models\Config;

class m150305_231702_add_settings_values extends Migration
{
    private $configTbl;

    public function init()
    {
        parent::init();
        $this->configTbl = Config::tableName();
    }

    public function getType()
    {
        return self::TYPE_BASE;
    }

    public function safeUp()
    {
        // todo localization
        $this->batchInsert( $this->configTbl,
            ["code", "type", "category", "title", "description", "value"],
            [
                ['siteName', 'string', 'Основные', 'Название сайта', 'Название сайта, используемое в тайтле, футере', 'GRASS'],
                ['siteKeywords', 'string', 'Основные', 'Ключевые слова', 'Используемые по умолчанию ключевые слова, через запятую', 'CMS GRASS, сайт'],
                ['siteDescription', 'string', 'Основные', 'Описание страниц сайта', 'Содержимое мета-тега Description', 'CMS GRASS'],
                ['maintenance', 'boolean', 'Основные', 'Сайт выключен', 'Выключение сайта и отображение заглушки', '0'],
                ['cachingTime', 'integer', 'Основные', 'Время жизни кеша', 'Стандартное время кеширования объектов (в секундах)', '3600'],
                ['mailSenderMail', 'string', 'Основные', 'Email отправителя', 'Email, указанный в качестве отправителя писем с сайта', 'info@greenrabbit.ru'],
                ['mailSenderName', 'string', 'Основные', 'Имя отправителя', 'Имя, указанное в качестве отправителя писем с сайта', 'Webmaster'],
            ]
        );
    }

    public function safeDown()
    {
        $this->delete( $this->configTbl);
    }
}
