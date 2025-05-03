<?php 
class Card {
    private string $cardNumber;
    private int $invalidAttempts = 0;
    private bool $isBlocked = false;
    private string $pin;

    public function __construct(string $cardNumber, string $pin){
        $this->cardNumber = $cardNumber;
        $this->pin = $pin;
    }

    public function validatePin(string $inputPin): void {
        if($this->isBlocked){
            throw new CardBlockedException("Card is Blocked");
        }

        if($inputPin !== $this->pin){
            $this->invalidAttempts++;
            if($this->invalidAttempts >= 3) {
                $this->isBlocked = true;
                throw new CardBlockedException("Card is blocked after 3 invalid attempts.");
            }
            throw new InvalidPinException("Invalid pin");
        }

        $this->invalidAttempts = 0;
    }

    public function isBlocked(): bool {
        return $this->isBlocked;
    }
}