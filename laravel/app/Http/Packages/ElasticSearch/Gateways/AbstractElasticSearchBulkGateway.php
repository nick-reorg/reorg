<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 7:13 PM
 */

namespace App\Http\Packages\ElasticSearch\Gateways;

use App;
use App\Http\Packages\ElasticSearch\Contracts\IndexableDocumentInterface;

/**
 * Class AbstractElasticSearchBulkGateway
 * @package App\Http\Packages\ElasticSearch\Gateways
 */
abstract class AbstractElasticSearchBulkGateway extends AbstractElasticSearchGateway
{
    /**
     * @var array
     */
    protected $bulkDocs = array('body' => array());

    /**
     * @return int
     */
    protected abstract function getBulkSize();

    /**
     * @param $id
     * @param string $verb
     * @return array
     */
    protected function makeBulkCommand($id, $verb = 'index')
    {
        $params = array();
        $params[$verb]['_index'] = $this->getIndex();
        $params[$verb]['_type'] = $this->getType();
        $params[$verb]['_id'] = $id;
        return $params;
    }

    /**
     * @param IndexableDocumentInterface[] $documents
     * @return array
     */
    public function bulkIndex(array $documents)
    {
        $response = array();
        foreach ($documents as $document) {
            $command = $this->makeBulkCommand($document->getID());

            /**
             * This is an unusual syntax, but its how ElasticSearch takes bulk queries. You send an array of
             * queries in the body in pairs. The first is the command (index a document), and the second is the
             * data the command operates on. In this case we're sending an index request and a CMS record document.
             */
            $this->bulkDocs['body'][] = $command;
            $this->bulkDocs['body'][] = $document->toArray();

            $response[] = $this->executeBulkIndex();
        }
        //Index any documents left over from count($documents) % bulkSize
        $response[] = $this->executeBulkIndex(true);

        return $response;
    }

    /**
     * Check if you've reached the bulk size required before sending the request then send it and clear the bulk
     * document buffer.
     *
     * @param bool $force
     * @return array
     */
    protected function executeBulkIndex($force = false)
    {
        $response = array();
        //Divide by 2 here to account for the command/body pairs.
        if (count($this->bulkDocs['body'])/2 >= $this->getBulkSize() || $force) {
            /**
             * If the total number of Docs happens to be a multiple of the bulkSize this stops an exception from
             * indexing nothing.
             */
            if (count($this->bulkDocs['body'])) {
                $response = $this->searchClient->bulk($this->bulkDocs);
                $this->bulkDocs = array('body' => array());
            }
        }
        return $response;
    }
}
