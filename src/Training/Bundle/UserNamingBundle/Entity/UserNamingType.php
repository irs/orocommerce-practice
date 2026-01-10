<?php

namespace Training\Bundle\UserNamingBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'user_naming_type')]
class UserNamingType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    public int $id;

    #[ORM\Column(type: Types::STRING, length: 64)]
    public string $title;

    #[ORM\Column(type: Types::STRING, length: 255)]
    public string $format;
}
