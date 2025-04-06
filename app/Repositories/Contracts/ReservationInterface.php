<?php


namespace App\Repositories\Contracts;

interface ReservationInterface
{
    public function find($id);
    public function update($id,$data);
    public function delete($id);
    public function insert($data);
}