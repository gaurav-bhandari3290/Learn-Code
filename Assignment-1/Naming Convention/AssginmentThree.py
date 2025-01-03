def calculate_armstrong_sum(number):
    # Initializing Sum and Number of Digits
    armstrong_sum = 0
    number_of_digit = 0

    # Calculating Number of individual digits
    number_copy = number
    while number_copy > 0:
        number_of_digit = number_of_digit + 1
        number_copy = number_copy // 10

    # Finding Armstrong Number
    number_copy = number
    for number in range(1, number_copy + 1):
        digit = number_copy % 10
        armstrong_sum = armstrong_sum + (digit ** number_of_digit)
        number_copy //= 10
    return armstrong_sum


# End of Function

# User Input
user_input = int(input("\nPlease Enter the Number to Check for Armstrong: "))

if (user_input == calculate_armstrong_sum(user_input)):
    print("\n %d is Armstrong Number.\n" % user_input)
else:
    print("\n %d is Not a Armstrong Number.\n" % user_input)
