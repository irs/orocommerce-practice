<?php

namespace Training\Bundle\IntegrationBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\EntityConfigBundle\Metadata\Attribute\Config;
use Oro\Bundle\IntegrationBundle\Entity\Transport;
use Symfony\Component\HttpFoundation\ParameterBag;

#[ORM\Entity]
#[Config]
class UserNamingSettings extends Transport
{
    #[ORM\Column(name: 'user_naming_url', type: Types::STRING, length: 255, nullable: false)]
    public ?string $url = null;

    private ParameterBag $settingsBag;

    public function getSettingsBag()
    {
        return $this->settingsBag ??= new ParameterBag(['url' => $this->url]);
    }
}
