<?php

namespace Reweb\Job\Backend\Tests;

use Reweb\Job\Backend;

/**
 * Teste unit�rio da classe Reweb\Job\Backend\CaixaEletronico
 */
class CaixaEletronicoTest extends \PHPUnit_Framework_TestCase
{
    /** @var Backend\CaixaEletronico */
    protected $caixaEletronico;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->caixaEletronico = new Backend\CaixaEletronico();
    }

    /**
     * @covers Reweb\Job\Backend\Example::examplo
     */
    public function testCaixaEletronico()
    {
        $this->assertEquals('CaixaEletronico', $this->caixaEletronico->verificaLimiteSaque());
    }
}
