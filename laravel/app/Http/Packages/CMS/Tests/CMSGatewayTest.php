<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/27/17
 * Time: 10:15 PM
 */

namespace App\Http\Packages\CMS\Tests;

use App\Http\Packages\CMS\Gateways\CMSGateway;
use App\Http\Packages\Utils\HttpClients\GuzzleClient;
use Mockery;
use Tests\TestCase;

/**
 * Class CMSGatewayTest
 * @package App\Http\Packages\CMS\Tests
 */
class CMSGatewayTest extends TestCase
{
    public function testFetchCMSRecords()
    {
        /** @var GuzzleClient $client */
        $client = Mockery::mock(GuzzleClient::class, array(
            'request' => array(
                array(
                    'physician_first_name' => 'That Creepy Doctor From Ocarina of Time',
                    'physician_last_name'  => 'The One Near Lake Hylia that gives you the frog for the Big Goron Sword Quest',
                    'physician_specialty'  => 'Nightmare fuel for small children.',
                    'record_id'            => '12345',
                )
            )
        ));
        $gateway = new CMSGateway($client);
        $records = $gateway->fetchRecords('The day after yesterday');
        $this->assertEquals('12345', $records[0]->getRecordId());
    }
}
