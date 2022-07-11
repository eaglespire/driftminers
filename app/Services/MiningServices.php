<?php

namespace App\Services;

class MiningServices
{
   protected int $duration;
   protected int $amountInvested;
   protected int $roi;
   protected float $profit = 0;
   protected float $output = 0;
   protected int $n;

   public function __construct($duration,$amountInvested,$roi, $n)
   {
       $this->roi = $roi;
       $this->duration = $duration;
       $this->amountInvested = $amountInvested;
       $this->n = $n;
   }

   public static function test(int $a)
   {
      return $a;
   }

   private function calculateProfit(): float|int
   {
       for($i=0; $i < $this->duration; $i++){
           $profit = ($this->roi/100) * $this->amountInvested;
           $this->profit += $profit;
       }
       return $this->profit;
   }
   public function store()
   {

   }
   public function getTotalAmount(): float|int
   {
       return $this->amountInvested + $this->calculateProfit();
   }
   public function getCompoundAmount(): float|int
   {
       $r = $this->roi / 100;
       $p = $this->amountInvested;
       $t = $this->duration;
       $n = $this->n;
       return $p * (pow(1 + ($r / $n),($n * $t)));
   }
}
