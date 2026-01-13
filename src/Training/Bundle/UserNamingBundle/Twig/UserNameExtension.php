<?php

namespace Training\Bundle\UserNamingBundle\Twig;

use Oro\Bundle\UserBundle\Entity\User;
use Training\Bundle\BundleExtensionBundle\Provider\EntityNameProvider;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class UserNameExtension extends AbstractExtension
{
    public function __construct(private readonly EntityNameProvider $userNameProvider)
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'user_name',
                fn (User $user) => $this->userNameProvider->getName(null, null, $user),
            ),
        ];
    }
}
