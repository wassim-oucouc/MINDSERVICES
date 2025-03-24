<?php

namespace App\Repositories\Contracts;

interface UserInterface
{
    public function find($id);
    public function Update($id,array $data);
    public function Delete($id);
    public function create(array $data);
}



?>