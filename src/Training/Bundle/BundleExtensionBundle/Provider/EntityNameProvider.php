<?php

namespace Training\Bundle\BundleExtensionBundle\Provider;

use Oro\Bundle\EntityBundle\Provider\EntityNameProviderInterface;
use Oro\Bundle\UserBundle\Entity\User;

readonly class EntityNameProvider implements EntityNameProviderInterface
{
    public function __construct(private EntityNameProviderInterface $decorated)
    {
    }

    public function getName($format, $locale, $entity): string
    {
        if ($entity instanceof User) {
            return implode(' ', [
                $entity->getLastName(),
                $entity->getFirstName(),
                $entity->getMiddleName(),
            ]);
        }

        return $this->decorated->getName($format, $locale, $entity);
    }

    public function getNameDQL($format, $locale, $className, $alias): string
    {
        return $this->decorated->getNameDQL($format, $locale, $className, $alias);
    }
}
