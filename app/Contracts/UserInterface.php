<?php
namespace App\Contracts;

interface UserInterface{

    public function allVendor();
    public function fetchSingleVendor($id);
    public function createVendor(array $data);
    public function updateVendor(array $data, $id);
    public function deleteVendor($id);

    public function allCustomer();
    public function fetchSingleCustomer($id);
    public function createCustomer(array $data);
    public function updateCustomer(array $data, $id);
    public function deleteCustomer($id);

    public function allAdmin();
    public function fetchSingleAdmin($id);
    public function createAdmin(array $data);
    public function updateAdmin(array $data, $id);
    public function deleteAdmin($id);

}