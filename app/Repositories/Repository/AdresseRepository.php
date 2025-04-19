<?php
namespace App\Repositories\Repository;

use App\Repositories\Contracts\AdresseInterface;
use App\Models\address_reservation;

class AdresseRepository implements AdresseInterface
{
    public function find($id)
    {
        $adress = address_reservation::find($id);

        return $adress;
    }
    public function Update($id,array $data)
    {

    }
    public function Delete($id)
    {

    }
    public function create(array $data)
    {
        $adress = address_reservation::create($data);

        return $adress;
    }
}


?>