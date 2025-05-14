<?php

use PHPUnit\Framework\TestCase;

require_once 'main.php';

class ProblemTest extends TestCase
{
    public function testDivisorCount()
    {
        $this->assertEquals(0,getNumberOfDivisors(-100));
        $this->assertEquals(0,getNumberOfDivisors(0));
        $this->assertEquals(1,getNumberOfDivisors(1));
        $this->assertEquals(2,getNumberOfDivisors(2));
        $this->assertEquals(3,getNumberOfDivisors(4));
        $this->assertEquals(2,getNumberOfDivisors(17));
        $this->assertEquals(9,getNumberOfDivisors(100));
    }

    public function testSameDivisorPairs()
    {
        $this->assertEquals(0,getConsecutivePairsWithSameDivisors(-14));
        $this->assertEquals(0,getConsecutivePairsWithSameDivisors(0));
        $this->assertEquals(0,getConsecutivePairsWithSameDivisors(1));
        $this->assertEquals(1,getConsecutivePairsWithSameDivisors(3));  
        $this->assertEquals(2,getConsecutivePairsWithSameDivisors(15));  
        $this->assertEquals(15,getConsecutivePairsWithSameDivisors(100)); 
        $this->assertEquals(118,getConsecutivePairsWithSameDivisors(1000)); 
    }
}