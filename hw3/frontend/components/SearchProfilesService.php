<?php


namespace frontend\components;

use yii\helpers\ArrayHelper;

class SearchProfilesService
{

    private $storage;
    public function __construct(ProfileStorage $storage)
    {
        $this->storage = $storage;
    }

    private $profiles = ['Sergey'=>'Ivanov', 'Anatoliy'=>'Egorov', 'Ivan'=>'Petrov'];

    public function SearchProfileName($name): ?string
    {
        $name = $this->storage->find($name);

        return mb_strtoupper($name, 'UTF-8');
    }
}