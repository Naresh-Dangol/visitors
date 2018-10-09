<?php

use App\Models\Record;
use App\Repositories\RecordRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RecordRepositoryTest extends TestCase
{
    use MakeRecordTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RecordRepository
     */
    protected $recordRepo;

    public function setUp()
    {
        parent::setUp();
        $this->recordRepo = App::make(RecordRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRecord()
    {
        $record = $this->fakeRecordData();
        $createdRecord = $this->recordRepo->create($record);
        $createdRecord = $createdRecord->toArray();
        $this->assertArrayHasKey('id', $createdRecord);
        $this->assertNotNull($createdRecord['id'], 'Created Record must have id specified');
        $this->assertNotNull(Record::find($createdRecord['id']), 'Record with given id must be in DB');
        $this->assertModelData($record, $createdRecord);
    }

    /**
     * @test read
     */
    public function testReadRecord()
    {
        $record = $this->makeRecord();
        $dbRecord = $this->recordRepo->find($record->id);
        $dbRecord = $dbRecord->toArray();
        $this->assertModelData($record->toArray(), $dbRecord);
    }

    /**
     * @test update
     */
    public function testUpdateRecord()
    {
        $record = $this->makeRecord();
        $fakeRecord = $this->fakeRecordData();
        $updatedRecord = $this->recordRepo->update($fakeRecord, $record->id);
        $this->assertModelData($fakeRecord, $updatedRecord->toArray());
        $dbRecord = $this->recordRepo->find($record->id);
        $this->assertModelData($fakeRecord, $dbRecord->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRecord()
    {
        $record = $this->makeRecord();
        $resp = $this->recordRepo->delete($record->id);
        $this->assertTrue($resp);
        $this->assertNull(Record::find($record->id), 'Record should not exist in DB');
    }
}
