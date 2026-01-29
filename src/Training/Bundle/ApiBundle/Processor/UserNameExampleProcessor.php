<?php

namespace Training\Bundle\ApiBundle\Processor;

use Oro\Bundle\UserBundle\Entity\User;
use Oro\Component\ChainProcessor\ContextInterface;
use Oro\Component\ChainProcessor\ProcessorInterface;
use Training\Bundle\BundleExtensionBundle\Provider\EntityNameProvider;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

readonly class UserNameExampleProcessor implements ProcessorInterface
{
    private User $sampleUser;

    public function __construct(private EntityNameProvider $nameProvider)
    {
        $this->sampleUser = new User()
            ->setNamePrefix('Dr.')
            ->setFirstName('John')
            ->setMiddleName('Michael')
            ->setLastName('Doe')
            ->setNameSuffix('Jr.');
    }

    public function process(ContextInterface $context)
    {
        $result = $context->getResult();

        if (isset($result['id'])) {
            $this->addExample($result);
        } else if (is_iterable($result)) {
            foreach ($result as &$userNaming) {
                $this->addExample($userNaming);
            }
        }
        $context->setResult($result);
    }

    private function addExample(array &$userNaming): void
    {
        $type = new UserNamingType();
        $type->setFormat($userNaming['format']);
        $this->sampleUser->set('user_naming_type', $type);

        $userNaming['nameExample'] = $this->nameProvider->getName(null, null, $this->sampleUser);
    }
}
