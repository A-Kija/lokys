<?php
namespace Trys\Parsiukai;
use Ramsey\Uuid\Uuid;

class Pirma {

    public static function hello() 
    {
        $uuid = Uuid::uuid4();
        printf(
            "UUID: %s\nVersion: %d\n",
            $uuid->toString(),
            $uuid->getFields()->getVersion()
        );
    }
}