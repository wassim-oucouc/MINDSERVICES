<?php

namespace App\Repositories\Contracts;

interface UtilisateurInterface
{
    public function find($id);
    public function UpdateUtilisateur($id,array $data);
    public function Delete($id);
    public function create(array $data);
}



?>