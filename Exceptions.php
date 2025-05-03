<?php
class ATMException extends Exception {}
class InsufficientBalanceException extends ATMException{}
class InsufficientFundsException extends ATMException {}
class ServerConnectionException extends ATMException {}
class InvalidPinException extends ATMException {}
class CardBlockedException extends ATMException {}
class DailyLimitExceededException extends ATMException {}