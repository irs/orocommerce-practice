<?php

namespace Training\Bundle\WorkflowBundle\Transition;

use Doctrine\Common\Collections\Collection;
use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\UserBundle\Entity\User;
use Oro\Bundle\WorkflowBundle\Entity\WorkflowItem;
use Oro\Bundle\WorkflowBundle\Model\TransitionServiceInterface;

readonly class ResetUserNameTransition implements TransitionServiceInterface
{
    public function __construct(private ObjectManager $entityManager)
    {
    }

    public function isPreConditionAllowed(WorkflowItem $workflowItem, ?Collection $errors = null): bool
    {
        return true;
    }

    public function isConditionAllowed(WorkflowItem $workflowItem, ?Collection $errors = null): bool
    {
        return true;
    }

    public function execute(WorkflowItem $workflowItem): void
    {
        $user = $workflowItem->getEntity();

        if ($user instanceof User) {
            $user->setNamePrefix(null)
                ->setFirstName(null)
                ->setMiddleName(null)
                ->setLastName(null)
                ->setNameSuffix(null)
                ->setUserNamingType(null);

            $this->entityManager->persist($user);
        }
    }
}
