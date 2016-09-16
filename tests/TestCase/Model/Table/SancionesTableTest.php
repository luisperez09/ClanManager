<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SancionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SancionesTable Test Case
 */
class SancionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SancionesTable
     */
    public $Sanciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sanciones',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sanciones') ? [] : ['className' => 'App\Model\Table\SancionesTable'];
        $this->Sanciones = TableRegistry::get('Sanciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sanciones);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
