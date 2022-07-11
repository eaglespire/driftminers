<?php

namespace App\Helpers;

use App\Models\User;

class UserHelpers
{
   public static function getAdmins()
   {
       return User::admins()->get();
   }
   public static function getUser($id)
   {
       return User::getUserById($id)->first();
   }
}
