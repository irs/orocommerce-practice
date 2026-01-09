<?php

namespace Training\Bundle\BundleExtensionBundle\EventListener;

use Oro\Bundle\EntityBundle\Provider\EntityNameProviderInterface;
use Oro\Bundle\UIBundle\Event\BeforeListRenderEvent;

readonly class UserViewListener
{
    public function __construct(private EntityNameProviderInterface $nameProvider)
    {
    }

    public function onView(BeforeListRenderEvent $event)
    {
        $fullName = $this->nameProvider->getName(EntityNameProviderInterface::FULL, null, $event->getEntity());

        $template = $event->getEnvironment()->render(
            '@TrainingBundleExtension/user_info.html.twig',
            [
                'user' => $event->getEntity(),
                'fullName' => $fullName,
            ],
        );
        $event->getScrollData()->addSubBlockData(0, 1, $template);
    }
}
