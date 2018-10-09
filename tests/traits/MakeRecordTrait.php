<?php

use Faker\Factory as Faker;
use App\Models\Record;
use App\Repositories\RecordRepository;

trait MakeRecordTrait
{
    /**
     * Create fake instance of Record and save it in database
     *
     * @param array $recordFields
     * @return Record
     */
    public function makeRecord($recordFields = [])
    {
        /** @var RecordRepository $recordRepo */
        $recordRepo = App::make(RecordRepository::class);
        $theme = $this->fakeRecordData($recordFields);
        return $recordRepo->create($theme);
    }

    /**
     * Get fake instance of Record
     *
     * @param array $recordFields
     * @return Record
     */
    public function fakeRecord($recordFields = [])
    {
        return new Record($this->fakeRecordData($recordFields));
    }

    /**
     * Get fake data of Record
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRecordData($recordFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Fullname' => $fake->word,
            'address' => $fake->word,
            'Telephone' => $fake->word,
            'mobile' => $fake->word,
            'purpose' => $fake->word,
            'visit' => $fake->word,
            'remarks' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $recordFields);
    }
}
