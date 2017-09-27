<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 4:06 PM
 */

namespace App\Http\Packages\CMS\Gateways;

use App\Http\Packages\CMS\Models\CMSRecord;
use App\Http\Packages\Utils\HttpClients\ClientInterface;

/**
 * This Gateway is responsible for all http communications with cms.gov
 *
 * Class CMSGateway
 * @package App\Http\Packages\CMS\Gateways
 */
class CMSGateway
{
    const DATE_FORMAT = 'Y-m-d';
    const ENDPOINT_GET_RECORD = 'resource/vq63-hu5i.json?';
    const FILTER_DATE = 'date_of_payment=';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var
     */
    private $baseUrl;

    /**
     * CMSGateway constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        $this->baseUrl = config('cms.host');
    }

    /**
     * @param $date
     * @return CMSRecord[]
     */
    public function fetchRecords($date)
    {
        $records = array();
        $url = $this->baseUrl . self::ENDPOINT_GET_RECORD . self::FILTER_DATE . $date;
        $response = $this->client->request('GET', $url);
        foreach ($response as $row) {
            $record = new CMSRecord();
            $record->extractRow($row);
            $records[] = $record;
        }
        return $records;
    }
}
