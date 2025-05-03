<?php
class BankServer{
    private bool $isConnected;

    public function __construct(bool $isConnected = true){
        $this->isConnected = $isConnected;
    }

    public function connect(): void{
        if(!$this->isConnected){
            throw new ServerConnectionException("Unable to connect to the server");
        }
    }
}