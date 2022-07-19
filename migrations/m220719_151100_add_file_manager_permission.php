<?php

namespace fileManager\migrations;

use yii\db\Migration;
use rbacUserManager\components\MigrationTrait;

/**
 * Add permission `fileManager`.
 */
class m220719_151100_add_file_manager_permission extends Migration
{

    use MigrationTrait;

    protected $permissions = [
        [
            'name'          => 'fileManager',
            'ruleName'      => null,
            'description'   => 'Разрешение управлять файловым редактором.',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addPermissions($this->permissions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->deletePermissions($this->permissions);
    }
    
}
