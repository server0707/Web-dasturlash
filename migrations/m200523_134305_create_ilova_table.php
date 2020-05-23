<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ilova}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%hayriya}}`
 */
class m200523_134305_create_ilova_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ilova}}', [
            'id' => $this->primaryKey(),
            'hayriya_id' => $this->integer()->notNull(),
            'type' => 'enum("rasm","file") NOT NULL',
            'rasm' => $this->string(255),
            'file' => $this->string(255),
            'date' => $this->timestamp(),
        ]);

        // creates index for column `hayriya_id`
        $this->createIndex(
            '{{%idx-ilova-hayriya_id}}',
            '{{%ilova}}',
            'hayriya_id'
        );

        // add foreign key for table `{{%hayriya}}`
        $this->addForeignKey(
            '{{%fk-ilova-hayriya_id}}',
            '{{%ilova}}',
            'hayriya_id',
            '{{%hayriya}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%hayriya}}`
        $this->dropForeignKey(
            '{{%fk-ilova-hayriya_id}}',
            '{{%ilova}}'
        );

        // drops index for column `hayriya_id`
        $this->dropIndex(
            '{{%idx-ilova-hayriya_id}}',
            '{{%ilova}}'
        );

        $this->dropTable('{{%ilova}}');
    }
}
