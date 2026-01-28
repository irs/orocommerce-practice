<?php

namespace Training\Bundle\UserNamingBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\EntityConfigBundle\Metadata\Attribute\Config;
use Oro\Bundle\EntityConfigBundle\Metadata\Attribute\ConfigField;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityInterface;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityTrait;
use Symfony\Component\Form\FormTypeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'user_naming_type')]
#[Config(
    routeName: 'training_user_naming_type_index',
    routeView: 'training_user_naming_type_view',
    defaultValues: [
        'security' => [
            'type' => 'ACL',
            'permissions' => 'VIEW;DELETE;CREATE',
            'group_name' => '',
            'category' => 'account_management',
        ],
    ],
)]
class UserNamingType implements ExtendEntityInterface
{
    use ExtendEntityTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    #[ConfigField]
    public int $id;

    #[ORM\Column(type: Types::STRING, length: 64)]
    #[ConfigField(defaultValues: ['importexport' => ['identity' => true]])]
    public string $title;

    #[ORM\Column(type: Types::STRING, length: 255)]
    #[ConfigField]
    public string $format;

    public function __toString(): string
    {
        return $this->title;
    }
}
