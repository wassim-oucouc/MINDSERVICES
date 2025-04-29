<?php


namespace App\Repositories\Contracts;

interface AvisInterface
{
    public function find($id);
    public function Update($id,array $data);
    public function Delete($id);
    public function create(array $data);
    public function ReadAvis();
}