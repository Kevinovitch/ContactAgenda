<?php

namespace App\Model;

use App\Models\AbstractModel;

class UserModel extends AbstractModel
{
    /** @var string  */
    protected $table = "users";

    /**
     * @return mixed
     */
    public function login()
    {
        return $this->query("SELECT * FROM $this->table WHERE login = '' AND password = md5()");
    }
}