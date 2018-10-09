<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RecordApiTest extends TestCase
{
    use MakeRecordTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRecord()
    {
        $record = $this->fakeRecordData();
        $this->json('POST', '/api/v1/records', $record);

        $this->assertApiResponse($record);
    }

    /**
     * @test
     */
    public function testReadRecord()
    {
        $record = $this->makeRecord();
        $this->json('GET', '/api/v1/records/'.$record->id);

        $this->assertApiResponse($record->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRecord()
    {
        $record = $this->makeRecord();
        $editedRecord = $this->fakeRecordData();

        $this->json('PUT', '/api/v1/records/'.$record->id, $editedRecord);

        $this->assertApiResponse($editedRecord);
    }

    /**
     * @test
     */
    public function testDeleteRecord()
    {
        $record = $this->makeRecord();
        $this->json('DELETE', '/api/v1/records/'.$record->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/records/'.$record->id);

        $this->assertResponseStatus(404);
    }
}
