<?php

namespace Training\Bundle\BundleExtensionBundle\Provider;

use Oro\Bundle\EntityBundle\Provider\EntityNameProviderInterface;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityInterface;
use Oro\Bundle\UserBundle\Entity\User;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

readonly class EntityNameProvider implements EntityNameProviderInterface
{
    public function __construct(private EntityNameProviderInterface $decorated)
    {
    }

    public function getName($format, $locale, $entity): string
    {
        if ($entity instanceof User) {
            $type = $entity->get('user_naming_type');

            if ($type instanceof UserNamingType) {
                return str_replace(
                    [
                        'PREFIX',
                        'FIRST',
                        'MIDDLE',
                        'LAST',
                        'SUFFIX',
                    ],
                    [
                        $entity->getNamePrefix(),
                        $entity->getFirstName(),
                        $entity->getMiddleName(),
                        $entity->getLastName(),
                        $entity->getNameSuffix(),
                    ],
                    $type->format,
                );
            }

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
