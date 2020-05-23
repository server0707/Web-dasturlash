<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%muhtoj}}`.
 */
class m200523_133847_create_muhtoj_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%muhtoj}}', [
            'id' => $this->primaryKey(),
            'shaxs' => 'enum("jismoniy","yuridik") NOT NULL',
            'tashkilot' => $this->string(255),
            'fio' => $this->string(),
            'pasport_seriya' => $this->string(15),
            'pasport_raqam' => $this->string(45),
            'manzil' => $this->string()->notNull(),
            'oila_azolar' => $this->integer(),
            'mehnatga_yaroqli' => $this->integer(),
            'mehnatga_yaroqsiz' => $this->integer(),
            'izoh' => $this->text(),
            'hisob_raqam' => $this->integer(),
            'uzcard' => $this->integer(),
            'humo' => $this->integer(),
            'tel' => $this->string(45),
            'date' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%muhtoj}}');
    }
}
