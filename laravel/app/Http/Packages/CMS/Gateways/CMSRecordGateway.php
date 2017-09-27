<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 6:32 PM
 */

namespace App\Http\Packages\CMS\Gateways;

use App\Http\Packages\CMS\Models\CMSRecord;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

/**
 * Class CMSRecordGateway
 * @package App\Http\Packages\CMS\Gateways
 */
class CMSRecordGateway
{
    /**
     * @param array $records
     * @return array
     */
    public function saveRecords(array $records)
    {
        $ids = array();
        foreach ($records as $record) {
            $ids[] = $this->saveRecord($record);
        }
        return $ids;
    }

    /**
     * The ID is pulled from the record_id field
     *
     * @param CMSRecord $record
     * @return int
     */
    public function saveRecord(CMSRecord $record)
    {
        return $this->db()->insertGetId($record->toArray());
    }

    /**
     * This query builder will automatically protect against SQL injection.
     *
     * @return Builder
     */
    private function db()
    {
        return DB::table('cms_record');
    }
}
