<?php
namespace App\Contracts;

interface AdminInterface{


    public function fatchAll();
    public function fetchSingle($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function destroy($id);


}