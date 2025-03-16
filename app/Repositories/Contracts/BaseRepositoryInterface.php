<?php

namespace App\Repositories\Contracts;

interface BaseRepositoryInterface
{
    public function find($id);
    public function Update($id,array $data);
    public function Delete($id);
    public function Insert(array $data,array $dataclient);
}



?>