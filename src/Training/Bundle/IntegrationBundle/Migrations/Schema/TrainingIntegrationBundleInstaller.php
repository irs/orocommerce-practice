<?php

namespace Training\Bundle\IntegrationBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

/**
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.ExcessiveClassLength)
 */
class TrainingIntegrationBundleInstaller implements Installation
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
        $schema->getTable('oro_integration_transport')
            ->addColumn('user_naming_url', Types::STRING, ['notnull' => false, 'length' => 255]);
    }
}
