<?php

namespace Test;

require_once __DIR__ . '/../../vendor/autoload.php';

use Halfpastfour\PHPChartJS\Chart\Bar;
use Halfpastfour\PHPChartJS\ChartInterface;
use Halfpastfour\PHPChartJS\DataSet\BarDataSet;

/**
 * Class BarTest
 * @package Test
 */
class BarTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Test the factory for creating a Bar chart
	 */
	public function testBar()
	{
		$bar     = new Bar();

		// Check if correct class is returned.
		$this->assertInstanceOf( ChartInterface::class, $bar, 'The correct interface has been implemented' );
		$this->assertInstanceOf( Bar::class, $bar, 'The correct class has been created' );
	}

	/**
	 * Test the DataSet created by the Bar chart
	 */
	public function testDataSet()
	{
		$bar       = new Bar();
		$chartData = [ 0, 1, 4, 2, 3, 0, 5, 2, 6 ];

		// DataSet
		$dataSet = $bar->createDataSet();
		$this->assertInstanceOf( BarDataSet::class, $dataSet, 'The correct class has been created by the chart' );

		// Populate the collection
		$dataSet->data()->exchangeArray( $chartData );

		// Check if data is still correct.
		$bar->addDataSet( $dataSet );
		$this->assertEquals( $chartData, $bar->getDataSets()->offsetGet( 0 )->data()->getArrayCopy() );
	}
}