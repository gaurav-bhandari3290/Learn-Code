using System;

class ArrayMeanCalculator
{
    static void Main(string[] args)
    {
        var input = GetUserInputAsIntArray();
        int lengthOfArray = input[0];
        int numberOfQuery = input[1];
        int[] array = GetUserInputAsIntArray();
        int[] sumArray = SumArray(array, lengthOfArray);
        QueryParse(sumArray, numberOfQuery);
    }

    private static int[] GetUserInputAsIntArray()
    {
        return Array.ConvertAll(Console.ReadLine().Split(), int.Parse);
    }

    private static int[] SumArray(int[] array, int length)
    {
        int[] sumArray = new int[length + 1];
        sumArray[0] = 0;
        for (int index = 1; index <= length; index++)
        {
            sumArray[index] = sumArray[index - 1] + array[index - 1];
        }
        return sumArray;
    }

    private static void QueryParse(int[] sumArray, int numberOfQuery) 
    {
        for (int index = 0; index < numberOfQuery; index++)
        {
            var query = GetUserInputAsIntArray();
            int leftIndex = query[0];
            int rightIndex = query[1];
            int mean = CalculateMeanValue(sumArray, leftIndex, rightIndex);
            Console.WriteLine(mean);
        }
    }

    private static int CalculateMeanValue(int[] sumArray, int left, int right)
    {
        int sum = sumArray[right] - sumArray[left - 1];
        int count = right - left + 1;
        return sum / count;
    }
}
