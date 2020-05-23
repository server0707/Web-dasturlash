<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sahiy}}`.
 */
class m200523_133838_create_sahiy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sahiy}}', [
            'id' => $this->primaryKey(),
            'shaxs' => 'enum("jismoniy","yuridik","erkin") NOT NULL',
            'tashkilot' => $this->string(255),
            'fio' => $this->string(),
            'pasport_seriya' => $this->string(15),
            'pasport_raqam' => $this->string(45),
            'manzil' => $this->string()->notNull(),
            'tel' => $this->string(45),
            'date' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sahiy}}');
    }
}
