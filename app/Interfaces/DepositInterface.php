<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface DepositInterface
{
    public function storeDeposit(Request $request);
    //public function validate_deposit(array $data);
    public function confirmDeposit($id);
    public function getConfirmedDeposits();
    public function getUnconfirmedDeposits();
    public function getSingleDeposit($id);
}
