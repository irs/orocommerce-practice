<?php

namespace Training\Bundle\UserNamingBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\EntityConfigBundle\Metadata\Attribute\Config;
use Oro\Bundle\EntityConfigBundle\Metadata\Attribute\ConfigField;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityInterface;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityTrait;

#[ORM\Entity]
#[ORM\Table(name: 'user_naming_type')]
#[Config]
class UserNamingType implements ExtendEntityInterface
{
    use ExtendEntityTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    #[ConfigField]
    public int $id;

    #[ORM\Column(type: Types::STRING, length: 64)]
    #[ConfigField]
    public string $title;

    #[ORM\Column(type: Types::STRING, length: 255)]
    #[ConfigField]
    public string $format;
}
