<?php

namespace Training\Bundle\UserNamingBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityBundle\EntityConfig\DatagridScope;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

/**
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.ExcessiveClassLength)
 */
class TrainingUserNamingBundleInstaller implements Installation
{
    /**
     * @inheritDoc
     */
    public function getMigrationVersion(): string
    {
        return 'v1_0';
    }

    /**
     * @inheritDoc
     */
    public function up(Schema $schema, QueryBag $queries): void
    {
        /** Tables generation **/
        $this->createUserNamingTypeTable($schema);

        /** Foreign keys generation **/
    }

    /**
     * Create user_naming_type table
     */
    private function createUserNamingTypeTable(Schema $schema): void
    {
        $table = $schema->createTable('user_naming_type');

        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
        ]);
        $table->addColumn('title', 'string', [
            'length' => 64,
            'oro_options' => [
                'extend'    => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                'datagrid'  => ['is_visible' => DatagridScope::IS_VISIBLE_TRUE],
                'form'      => ['type' => 'text'],
                'view'      => ['type' => 'text'],
            ],
        ]);
        $table->addColumn('format', 'string', [
            'length' => 255,
            'oro_options' => [
                'extend'    => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                'datagrid'  => ['is_visible' => DatagridScope::IS_VISIBLE_TRUE],
                'form'      => ['type' => 'text'],
                'view'      => ['type' => 'text'],
            ],
        ]);
        $table->setPrimaryKey(['id']);
    }
}
