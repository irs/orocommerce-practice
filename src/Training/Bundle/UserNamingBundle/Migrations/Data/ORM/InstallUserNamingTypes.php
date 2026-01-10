<?php

namespace Training\Bundle\UserNamingBundle\Migrations\Data\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

class InstallUserNamingTypes extends AbstractFixture
{
    protected const array TYPES = [
        'Official' => 'PREFIX FIRST MIDDLE LAST SUFFIX',
        'Unofficial' => 'FIRST LAST',
        'First name only' => 'FIRST',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (static::TYPES as $title => $format) {
            $type = new UserNamingType();
            $type->title = $title;
            $type->format = $format;
            $manager->persist($type);
        }
        $manager->flush();
    }
}
