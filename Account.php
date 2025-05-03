<?php
class Account {
    private float $balance;
    private float $dailyLimit;
    private float $withdrawnToday = 0;

    public function __construct(float $balance, float $dailyLimit){
        $this->balance = $balance;
        $this->dailyLimit = $dailyLimit;
    }

    public function debit(float $amount): void{
        if($amount > $this->balance){
            throw new InsufficientBalanceException("Insufficient funds in account");
        }

        if($this->withdrawnToday + $amount > $this->dailyLimit){
            throw new DailyLimitExceededException("Daily withdrawal limit exceeded");
        }

        $this->balance -= $amount;
        $this->withdrawnToday += $amount;
    }

    public function getBalance(): float{
        return $this->balance;
    }
}
