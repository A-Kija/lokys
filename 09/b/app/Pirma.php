<?php
namespace Trys\Parsiukai;
use Ramsey\Uuid\Uuid;
use App\DB\DataBase;

class Pirma extends Trecia implements DataBase {

    public static function hello() 
    {
        $uuid = Uuid::uuid4();
        printf(
            "UUID: %s\nVersion: %d\n",
            $uuid->toString(),
            $uuid->getFields()->getVersion()
        );
    }

    public function create(array $userData) : void{}
 
    public function update(int $userId, array $userData) : void{}
 
    public function delete(int $userId) : void{}
 




}