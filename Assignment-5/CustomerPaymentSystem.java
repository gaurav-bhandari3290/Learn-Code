class Customer {
    private String firstName;
    private String lastName;
    private Wallet myWallet;

    public Customer(String firstName, String lastName, float initialMoney) {
        this.firstName = firstName;
        this.lastName = lastName;
        this.myWallet = new Wallet(initialMoney);
    }

    public String getFirstName() {
        return firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public String makePayment(float amount) {
        try {
            if (myWallet.subtractMoney(amount)) {
                return "Payment successful";
            } else {
                return "Payment failed! Not enough balance.";
            }
        } catch (IllegalArgumentException e) {
            return "Payment failed: " + e.getMessage();
        }
    }
}

class Wallet {
    private float value;

    public Wallet(float initialMoney) {
        if (initialMoney < 0) {
            throw new IllegalArgumentException("Initial money cannot be negative");
        }
        this.value = initialMoney;
    }

    public float getTotalMoney() {
        return value;
    }

    public boolean subtractMoney(float debit) {
        if (debit < 0) {
            throw new IllegalArgumentException("Debit amount cannot be negative");
        }
        if (value >= debit) {
            value -= debit;
            return true;
        } else {
            return false;
        }
    }

    public void addMoney(float deposit) {
        if (deposit < 0) {
            throw new IllegalArgumentException("Deposit amount cannot be negative");
        }
        value += deposit;
    }
}


public class Main {
    public static void main(String[] args) {
        Customer myCustomer = new Customer("Gaurav", "Bhandari", 2000);
        myCustomer.subtractMoney(2);
    }
}
