<?php

namespace Training\Bundle\UserNamingBundle\Controller;

use Oro\Bundle\SecurityBundle\Attribute\Acl;
use Oro\Bundle\SecurityBundle\Attribute\AclAncestor;
use Oro\Bundle\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

class UserNamingTypeController extends AbstractController
{
    #[Route(path: '/', name: 'training_user_naming_type_index')]
    #[Template]
    public function indexAction(): array
    {
        return [
            'entity_class' => UserNamingType::class,
        ];
    }

    #[Route(path: '/view/{id}', name: 'training_user_naming_type_view', requirements: ['id' => '\d+'])]
    #[Template]
    #[AclAncestor('training_user_namig_type_view')]
    public function viewAction(UserNamingType $type): array
    {
        return [
            'entity' => $type,
            'sample_user' => new User()
                ->setNamePrefix('Dr.')
                ->setFirstName('John')
                ->setMiddleName('Michael')
                ->setLastName('Doe')
                ->setNameSuffix('Jr.')
                ->set('user_naming_type', $type),
        ];
    }
}
