<?php

namespace Framework\Doctrine;

use Doctrine\ORM\EntityManager as ORMEntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMSetup;
use Framework\Config\Config;

class EntityManager
{
    protected static EntityManagerInterface|null $em = null;

    public static function getInstance()
    {
        if (null === self::$em) {
            $config = ORMSetup::createAttributeMetadataConfiguration(
                paths: [Config::get('ENTITY_PATH')],
                isDevMode: true,
            );

            self::$em = ORMEntityManager::create(Config::get('DATABASE_CONFIG'), $config);
        }

        return self::$em;
    }
}
