<?php

namespace ExcelAnt\Table;

use ExcelAnt\Table\Table;
use ExcelAnt\Cell\Cell;
use ExcelAnt\Style\StyleInterface;

class TableTest extends \PHPUnit_Framework_TestCase
{
    public function testSetLabelWithDefaultConfiguration()
    {
        $labelsInput = ['Foo', 'Bar', 'Baz'];

        $table = new Table();
        $table->setLabels($labelsInput);

        $labels = $table->getLabels();

        foreach ($labels as $key => $label) {
            $this->assertInstanceOf('ExcelAnt\Cell\Cell', $label);
            $this->assertEquals($labelsInput[$key], $label->getValue());
        }
    }

    public function testSetAndGetCell()
    {
        $table = new Table();
        $table->setCell(new Cell('Foo'));
        $cellCollection = $table->getCells();

        $this->assertCount(1, $cellCollection);
        $this->assertEquals('Foo', $cellCollection[0]->getValue());
    }

    private function getStyleInterfaceMock()
    {
        return $this->getMockBuilder('ExcelAnt\Style\StyleInterface')->disableOriginalConstructor()->getMock();
    }
}