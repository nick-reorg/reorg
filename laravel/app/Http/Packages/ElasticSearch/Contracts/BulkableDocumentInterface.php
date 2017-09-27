<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 7:17 PM
 */

namespace App\Http\Packages\ElasticSearch\Contracts;

/**
 * Implementing this Interface allows for bulk Indexing of documents in ElasticSearch.
 *
 * Interface DeterministicIdentifierInterface
 * @package app\Http\Packages\ElasticSearch\Contracts
 */
interface BulkableDocumentInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * Should basically be the same as toArray(), but exclude any fields that aren't meant to be searchable.
     *
     * @return array
     */
    public function makeBody();
}
