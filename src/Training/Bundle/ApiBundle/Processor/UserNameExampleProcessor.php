<?php

namespace Training\Bundle\ApiBundle\Processor;

use Oro\Bundle\UserBundle\Entity\User;
use Oro\Component\ChainProcessor\ContextInterface;
use Oro\Component\ChainProcessor\ProcessorInterface;
use Training\Bundle\BundleExtensionBundle\Provider\EntityNameProvider;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

readonly class UserNameExampleProcessor implements ProcessorInterface
{
    public function __construct(private EntityNameProvider $nameProvider)
    {
    }

    public function process(ContextInterface $context)
    {
        $result = $context->getResult();

        foreach ($result as &$userNaming) {
            $type = new UserNamingType();
            $type->format = $userNaming['format'];

            $user = new User()
                ->setNamePrefix('Dr.')
                ->setFirstName('John')
                ->setMiddleName('Michael')
                ->setLastName('Doe')
                ->setNameSuffix('Jr.')
                ->set('user_naming_type', $type);

            $userNaming['nameExample'] = $this->nameProvider->getName(null, null, $user);
        }
        $context->setResult($result);
    }
}
