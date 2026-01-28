<?php

namespace Training\Bundle\IntegrationBundle\Provider;

use Oro\Bundle\IntegrationBundle\Provider\AbstractConnector;
use Oro\Bundle\BatchBundle\Item\ItemReaderInterface;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

class Connector extends AbstractConnector implements ItemReaderInterface
{
    public function getLabel(): string
    {
        return 'training.connector.label';
    }

    public function getImportEntityFQCN()
    {
        return UserNamingType::class;
    }

    public function getImportJobName()
    {
        return 'user_naming_types_import';
    }

    public function getType()
    {
        return 'user_naming_type';
    }

    protected function getConnectorSource()
    {
        return new \ArrayIterator($this->transport->getNamingTypes());
    }
}
