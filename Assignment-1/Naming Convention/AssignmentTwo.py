def guess_number(user_guess):
    if user_guess.isdigit() and 1<= int(user_guess) <=100:
        return True
    else:
        return False

def main():
    number=random.randint(1,100)
    correct_guess=False
    user_guess=input("Guess a number between 1 and 100:")
    total_attempts=0
    while not correct_guess:
        if not guess_number(user_guess):
            user_guess=input("I wont count this one Please enter a number between 1 to 100")
            continue
        else:
            total_attempts+=1
            user_guess=int(user_guess)

        if user_guess<number:
            user_guess=input("Too low. Guess again")
        elif user_guess>number:
            user_guess=input("Too High. Guess again")
        else:
            print("You guessed it in",total_attemts,"guesses!")
            correct_guess=True


main()