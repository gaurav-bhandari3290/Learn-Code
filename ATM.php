    <?php
    class ATM{
        private float $availableCash;
        private BankServer $server;

        public function __construct(float $availableCash, BankServer $server){
            $this->availableCash = $availableCash;
            $this->server = $server;
        }

        public function withdraw(Card $card, Account $account, string $pin, float $amount): void{
            try{
                $this->server->connect();
                $card->validatePin($pin);

                if($amount > $this->availableCash){
                    throw new InsufficientFundsException("ATM has Insufficient Exception");
                }

                $account->debit($amount);
                $this->availableCash -= $amount;

                echo "Withdrawn Successful\n";
            } catch(Exception $e){
                throw $e;
            }
        }
    }