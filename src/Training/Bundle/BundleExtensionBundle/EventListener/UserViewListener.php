<?php

namespace Training\Bundle\BundleExtensionBundle\EventListener;

use Oro\Bundle\EntityBundle\Provider\EntityNameProviderInterface;
use Oro\Bundle\UIBundle\Event\BeforeListRenderEvent;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

readonly class UserViewListener
{
    public function __construct(
        private EntityNameProviderInterface $nameProvider,
        private AuthorizationCheckerInterface $authChecker,
    ) {
    }

    public function onView(BeforeListRenderEvent $event)
    {
        if (!$this->authChecker->isGranted('training_user_naming_show')) {
            return;
        }
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
