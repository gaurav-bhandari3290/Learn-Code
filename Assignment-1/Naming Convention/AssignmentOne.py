Assignment 1


import random
def get_roll_dice_number(number_of_sides):
    result_side=random.randint(1, number_of_sides)
    return result_side


def main():
    number_of_sides=6
    keep_rolling=True
    while keep_rolling:
        user_choice=input("Ready to roll? Enter Q to Quit")
        if user_choice.lower() !="q":
            =fun(number_of_sides)
            print("You have rolled a",result_side)
        else:
            keep_rolling=False