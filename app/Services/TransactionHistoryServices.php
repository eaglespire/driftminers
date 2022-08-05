<?php

namespace App\Services;

use App\Models\TransactionHistory;

class TransactionHistoryServices
{
   public function histories($userId)
   {
       //fetch the transaction histories of this user
       return TransactionHistory::where('user_id',$userId)->paginate(5);
   }
}
