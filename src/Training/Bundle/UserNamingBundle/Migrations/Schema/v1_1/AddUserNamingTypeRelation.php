<?php

namespace Training\Bundle\UserNamingBundle\Migrations\Schema\v1_1;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class AddUserNamingTypeRelation implements Migration, ExtendExtensionAwareInterface
{
    private ExtendExtension $extendExtension;

    public function setExtendExtension(ExtendExtension $extendExtension)
    {
        $this->extendExtension = $extendExtension;
    }

    public function up(Schema $schema, QueryBag $queries)
    {
        $this->extendExtension->addManyToOneRelation(
            schema: $schema,
            table: 'oro_user',
            associationName: 'user_naming_type',
            targetTable: 'user_naming_type',
            targetTitleColumnName: 'title',
            options: [
                'extend' => ['owner' => ExtendScope::OWNER_CUSTOM],
            ],
        );
    }
}
