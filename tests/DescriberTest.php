<?php
use admonkey\Describer;
class DescriberTest extends PHPUnit_Framework_TestCase
{

 public function xmlDataProvider()
  {
    return [
      ['sample'],
    ];
  }

  /**
   *  @testdox Can describe XML
   *  @dataProvider xmlDataProvider
   */
  public function testCanDescribeXML($table)
  {
    $xml      = file_get_contents(__DIR__."/data/$table.xml");
    $expected = require(__DIR__."/data/$table.expected.php");
    $xts      = new Describer();

    $actual   = $xts->describe($xml);

    $this->assertEquals($expected, $actual);
  }

}
