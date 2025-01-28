import random

def is_valid_input(user_input):
    return (user_input.isdigit() and 1 <= int(user_input) <= 100)

def get_user_guess():
    user_input = input("Guess a number between 1 and 100:")
    while not is_valid_input(user_input):
        user_input = input("I wont count this one Please enter a number between 1 and 100:")
    return int(user_input)

def main():
    target = random.randint(1, 100)
    guess_count = 0
    guessed = False
    
    while not guessed:
        guess = get_user_guess()
        guess_count += 1
        
        if guess < target:
            print("Too low. Guess again")
        elif guess > target:
            print("Too high. Guess again")
        else:
            print("You guessed it in",guess_count, "guesses!")
            guessed = True

main()