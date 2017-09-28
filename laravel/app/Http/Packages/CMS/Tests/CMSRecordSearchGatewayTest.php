<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/27/17
 * Time: 9:52 PM
 */

namespace App\Http\Packages\CMS\Tests;

use App\Http\Packages\CMS\Gateways\CMSRecordSearchGateway;
use App\Http\Packages\Utils\SearchClients\ElasticSearchClient;
use Mockery;
use Tests\TestCase;

/**
 * Class CMSRecordSearchGatewayTest
 * @package App\Http\Packages\CMS\Tests
 */
class CMSRecordSearchGatewayTest extends TestCase
{
    /**
     * @group CMS
     */
    public function testSearch()
    {
        /** @var ElasticSearchClient $searchClient */
        $searchClient = Mockery::mock(ElasticSearchClient::class, array(
            'search' => array(
                'took' => 1,
                'timed_out' => null,
                '_shards' => array(
                    'total' => 5,
                    'successful' => 5,
                    'failed' => 0,
                ),
                'hits' => array(
                    'total' => 2,
                    'max_score' => 9001,
                    'hits' => array(
                        array(
                            '_index'  => 'cms_record_search_testing',
                            '_type'   => 'record',
                            '_id'     => '12345',
                            '_score'  => 9001,
                            '_source' => array(
                                'physician_first_name' => 'Dr. Mario',
                                'physician_last_name'  => 'Mario?',
                                'physician_specialty'  => 'Killing people by jamming 80 million random pills down their throat',
                                'record_id'            => '12345',
                            )
                        ),
                        array(
                            '_index'  => 'cms_record_search_testing',
                            '_type'   => 'record',
                            '_id'     => '67890',
                            '_score'  => 9001,
                            '_source' => array(
                                'physician_first_name' => 'Tim',
                                'physician_last_name'  => 'Whatley',
                                'physician_specialty'  => 'Not a real doctor.',
                                'record_id'            => '67890',
                            )
                        ),
                    )
                ),
            ),
        ));

        $gateway = new CMSRecordSearchGateway($searchClient);
        $response = $gateway->search('doesn\'t matter since the response is a mock');
        $this->assertEquals('12345', $response->getRecords()[0]->getRecordId());
        $this->assertEquals(2      , count($response->getRecords()));
    }
}
