<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 9:22 PM
 */

namespace App\Http\Packages\CMS\Models;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

/**
 * Not a ton of point to this class yet, but from my experience these types of applications expand greatly over time
 * and it becomes extremely useful to be able to access the result in all sorts of more dynamic ways and potentially to
 * do things like re-sort the results or do additional filtering. Having a response object gives us a good way to do a
 * lot of those things. I also want to convert the response array to objects anyway and this is a great spot to do it.
 *
 * I also like making a JsonSerializable object instead of building responses in the controller.
 *
 * Class CMSRecordSearchResult
 * @package App\Http\Packages\CMS\Models
 */
class CMSRecordSearchResult implements Arrayable, JsonSerializable
{
    /**
     * @var string
     */
    private $keyword;

    /**
     * @var int
     */
    private $resultCount;

    /**
     * @var CMSRecord[]
     */
    private $records = array();

    /**
     * CMSRecordSearchResult constructor.
     * @param array $response
     * @param $keyword
     */
    public function __construct(array $response, $keyword)
    {
        $this->keyword = $keyword;
        $this->resultCount = $response['hits']['total'];
        foreach ($response['hits']['hits'] as $hit) {
            $record = new CMSRecord();
            $record->extractRow($hit['_source']);
            $record->setScore($hit['_score']);
            $this->records[] = $record;
        }
    }

    /**
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @return int
     */
    public function getResultCount()
    {
        return $this->resultCount;
    }

    /**
     * @return CMSRecord[]
     */
    public function getRecords()
    {
        return $this->records;
    }

    /**
     * @return array
     */
    public function getRecordsAsArrays()
    {
        $recordArrays = array();
        foreach ($this->records as $record) {
            $recordArrays[] = $record->toArray();
        }
        return $recordArrays;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'count' => $this->resultCount,
            'records' => $this->records,
        );
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return $this->toArray();
    }

}
