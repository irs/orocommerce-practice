<?php

namespace Training\Bundle\ImportExportBundle\TemplateFixture;

use Oro\Bundle\ImportExportBundle\TemplateFixture\AbstractTemplateRepository;
use Oro\Bundle\ImportExportBundle\TemplateFixture\TemplateFixtureInterface;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

class UserNamingTypeFixture extends AbstractTemplateRepository implements TemplateFixtureInterface
{
    private const USER_NAMING_TYPE_CODE = 'example-user-naming-type';

    #[\Override]
    protected function createEntity($key)
    {
        return new UserNamingType();
    }

    #[\Override]
    public function getEntityClass()
    {
        return UserNamingType::class;
    }

    /**
     * @param UserNamingType $entity
     */
    #[\Override]
    public function fillEntityData($key, $entity)
    {
        if (self::USER_NAMING_TYPE_CODE == $key) {
            $entity->id = 1;
            $entity->title = 'Official';
            $entity->format = 'PREFIX FIRST MIDDLE LAST SUFFIX';

            return;
        }

        parent::fillEntityData($key, $entity);
    }

    #[\Override]
    public function getData()
    {
        return $this->getEntityData(self::USER_NAMING_TYPE_CODE);
    }
}