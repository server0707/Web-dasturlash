<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hayriya}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%sahiy}}`
 * - `{{%muhtoj}}`
 */
class m200523_134227_create_hayriya_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hayriya}}', [
            'id' => $this->primaryKey(),
            'beruvchi_id' => $this->integer()->notNull(),
            'oluvchi_id' => $this->integer()->notNull(),
            'hayriya_turi' => 'enum("oziq-ovqat","sovg\'a","moliyaviy","boshqa") NOT NULL',
            'izoh' => $this->text(),
            'date' => $this->timestamp(),
        ]);

        // creates index for column `beruvchi_id`
        $this->createIndex(
            '{{%idx-hayriya-beruvchi_id}}',
            '{{%hayriya}}',
            'beruvchi_id'
        );

        // add foreign key for table `{{%sahiy}}`
        $this->addForeignKey(
            '{{%fk-hayriya-beruvchi_id}}',
            '{{%hayriya}}',
            'beruvchi_id',
            '{{%sahiy}}',
            'id',
            'CASCADE'
        );

        // creates index for column `oluvchi_id`
        $this->createIndex(
            '{{%idx-hayriya-oluvchi_id}}',
            '{{%hayriya}}',
            'oluvchi_id'
        );

        // add foreign key for table `{{%muhtoj}}`
        $this->addForeignKey(
            '{{%fk-hayriya-oluvchi_id}}',
            '{{%hayriya}}',
            'oluvchi_id',
            '{{%muhtoj}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%sahiy}}`
        $this->dropForeignKey(
            '{{%fk-hayriya-beruvchi_id}}',
            '{{%hayriya}}'
        );

        // drops index for column `beruvchi_id`
        $this->dropIndex(
            '{{%idx-hayriya-beruvchi_id}}',
            '{{%hayriya}}'
        );

        // drops foreign key for table `{{%muhtoj}}`
        $this->dropForeignKey(
            '{{%fk-hayriya-oluvchi_id}}',
            '{{%hayriya}}'
        );

        // drops index for column `oluvchi_id`
        $this->dropIndex(
            '{{%idx-hayriya-oluvchi_id}}',
            '{{%hayriya}}'
        );

        $this->dropTable('{{%hayriya}}');
    }
}
