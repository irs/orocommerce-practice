<?php

namespace Training\Bundle\IntegrationBundle\Provider;

use Oro\Bundle\IntegrationBundle\Provider\ChannelInterface;
use Oro\Bundle\IntegrationBundle\Provider\IconAwareIntegrationInterface;

class Channel implements ChannelInterface
{
    public function getLabel(): string
    {
        return 'training.channel.label';
    }
}
