<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
interface UserInterface
{
    public function getAllUsers();
    public function createUser(Request $request);
    public function updateUserInformation(Request $request,$userId);
    public function  deleteUser($userId);
}
