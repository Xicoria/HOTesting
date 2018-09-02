<?php
namespace HOTesting\Tests;

class SqliteManagerTest extends BaseDatabaseTest
{
    private $sqliteManager;

    public function setUp(): void
    {
        parent::setUp();
        $this->sqliteManager = new \HOTesting\SqliteManager(self::$systemPdo);
    }

    public function testeUpdateGame()
    {
        $this->sqliteManager->updateGame(1, 'Player2');

        $expectedDataSet = $this->createXMLDataSet(__DIR__ . "/expected/SqliteManagerTestUpdateGame.xml");
        $this->assertDataSetsEqual($expectedDataSet, $this->getConnection()->createDataSet(['game']));
    }

    /**
     * Returns the test dataset.
     *
     * @return \PHPUnit\DbUnit\DataSet\IDataSet
     */
    protected function getDataSet()
    {
        return $this->createXMLDataSet(__DIR__ . '/fixtures/SqliteManagerTest.xml');
    }


}