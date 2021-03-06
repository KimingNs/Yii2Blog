<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "commentstatus".
 *
 * @property int $id
 * @property string $name
 * @property int $position
 */
class Commentstatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'commentstatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'position'], 'required'],
            [['id', 'position'], 'integer'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
        ];
    }
}
