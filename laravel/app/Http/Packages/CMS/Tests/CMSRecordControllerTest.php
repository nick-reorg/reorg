<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/27/17
 * Time: 3:02 AM
 */

namespace App\Http\Packages\CMS\Tests;

use App\Http\Packages\CMS\Gateways\CMSRecordSearchGateway;
use App\Http\Packages\CMS\Models\CMSRecord;
use App\Http\Packages\Utils\SearchClients\ElasticSearchClient;
use database\seeds\ElasticSearchTestSetup;
use Elasticsearch\ClientBuilder;
use Tests\TestCase;

/**
 * Class CMSRecordControllerTest
 * @package app\Http\Packages\CMS\Tests
 */
class CMSRecordControllerTest extends TestCase
{
    /**
     * @var CMSRecordSearchGateway
     */
    private $searchGateway;

    /**
     * CMSRecordControllerTest constructor.
     * @param null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $client = ClientBuilder::create()->build();
        $client = new ElasticSearchClient($client);
        $this->searchGateway = new CMSRecordSearchGateway($client);
    }

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
        $elasticSearchSeeder = new ElasticSearchTestSetup();
        $elasticSearchSeeder->setupElasticSearch();
    }

    /**
     * @group CMS
     */
    public function testFetchCMSData()
    {
        $body = array(
            'start' => '2016-01-01',
            'end' => '2016-01-05',
        );
        $headers = $this->getHeaders();
        $response = $this->json('POST', 'api/cms', $body, $headers);
        $response = json_decode($response->getContent(), true);
        $this->assertEquals(5           , count($response['dates_to_fetch']));
        $this->assertEquals('2016-01-03', $response['dates_to_fetch'][2]);
    }

    /**
     * @group CMS
     */
    public function testSearch()
    {
        $this->searchGateway->index($this->getDrCox());
        $this->searchGateway->index($this->getDrManhattan());
        $this->searchGateway->index($this->getDrWily());
        $response = $this->json('GET', 'api/cms?keyword=losing');
        $response = json_decode($response->getContent(), true);

        $this->assertEquals(2, count($response['records']));
        $this->assertEquals('Cox', $response['records'][0]['physician_last_name']);
        $this->assertEquals('Jonathan', $response['records'][1]['physician_first_name']);
    }

    /**
     * @return CMSRecord
     */
    private function getDrCox()
    {
        $row = array(
            'record_id' => 1337,
            'physician_first_name' => 'Percival',
            'physician_last_name'  => 'Cox',
            'physician_specialty'  => 'Doctor of Hating Hugh Jackmanology and losing patients to rabies',
        );
        $cox = new CMSRecord();
        $cox->extractRow($row);
        return $cox;
    }

    /**
     * @return CMSRecord
     */
    private function getDrManhattan()
    {
        $row = array(
            'record_id' => 1338,
            'physician_first_name' => 'Jonathan',
            'physician_last_name'  => 'Osterman',
            'physician_specialty'  => 'Doctor losing to Ozymandias despite being god',
        );
        $cox = new CMSRecord();
        $cox->extractRow($row);
        return $cox;
    }

    /**
     * @return CMSRecord
     */
    private function getDrWily()
    {
        $row = array(
            'record_id' => 1339,
            'physician_first_name' => 'Albert',
            'physician_last_name'  => 'Wily',
            'physician_specialty'  => 'Doctor of stealing robots.',
        );
        $cox = new CMSRecord();
        $cox->extractRow($row);
        return $cox;
    }

    /**
     * @return array
     */
    private function getHeaders()
    {
        return array(
            'Content-Type'     => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        );
    }
}
