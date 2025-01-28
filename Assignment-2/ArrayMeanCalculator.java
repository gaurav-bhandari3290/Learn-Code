class ArrayMeanCalculator
{
    static void Main(string[] args)
    {
        var input = Array.ConvertAll(Console.ReadLine().Split(), int.Parse);
        int lengthOfArray = input[0];
        int numberOfQuery = input[1];
        int[] array = Array.ConvertAll(Console.ReadLine().Split(), long.Parse);
        int[] sumArray = SumArray(array, lengthOfArray);
        QueryParse(sumArray, numberOfQuery);
    }

    private static void QueryParse(int[] sumArray, int numberOfQuery) 
    {
        for (int index = 0; index < numberOfQuery; index++)
        {
            var query = Array.ConvertAll(Console.ReadLine().Split(), int.Parse);
            int leftIndex = query[0];
            int rightIndex = query[1];
            int mean = calculateMean(sumArray, leftIndex, rightIndex);
            Console.WriteLine(mean);
        }
    }

    private static int[] SumArray(int[] array, int length)
    {
        int[] sumArray = new int[length + 1];
        sumArray[0] = 0;
        for (int i = 1; i <= length; i++)
        {
            sumArray[i] = sumArray[i - 1] + array[i - 1];
        }
        return sumArray;
    }

    private static int CalculateMean(int[] sumArray, int left, int right)
    {
        int sum = sumArray[right] - sumArray[left - 1];
        int count = right - left + 1;
        return sum / count;
    }
}