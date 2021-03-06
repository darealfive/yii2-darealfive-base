<?php

namespace darealfive\base\components;

use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * Class CacheableActiveRecord
 *
 * @package darealfive\base
 * @property string $created_at
 * @property string $updated_at
 *
 * @package darealfive\base\components
 */
abstract class CacheableActiveRecord extends ActiveRecord
{
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => TimestampBehavior::class,
                    'value' => new Expression('NOW()'),
                ]
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}