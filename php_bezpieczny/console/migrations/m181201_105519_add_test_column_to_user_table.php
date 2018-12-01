<?php

use yii\db\Migration;

/**
 * Handles adding test to table `user`.
 */
class m181201_105519_add_test_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'test', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'test');
    }
}
