<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 6:50 PM
 */

namespace App\Http\Packages\CMS\Gateways;

use App\Http\Packages\CMS\Models\CMSRecordSearchResult;
use App\Http\Packages\ElasticSearch\Gateways\AbstractElasticSearchBulkGateway;
use App\Http\Packages\CMS\Models\CMSRecord;

/**
 * Class CMSRecordSearchGateway
 * @package App\Http\Packages\CMS\Gateways
 */
class CMSRecordSearchGateway extends AbstractElasticSearchBulkGateway
{
    const INDEX = 'cms_record_search';
    const TYPE = 'record';

    /**
     * Get the index name appropriate for the current environment.
     *
     * @return string
     */
    protected function getIndex()
    {
        return self::INDEX . $this->getIndexSuffix();
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return self::TYPE;
    }

    /**
     * @return int
     */
    protected function getBulkSize()
    {
        return config('cms.bulk_size');
    }

    /**
     * @return int
     */
    protected function getSize()
    {
        return config('cms.size');
    }

    /**
     * @param $keyword
     * @return CMSRecordSearchResult
     */
    public function search($keyword)
    {
        $params = $this->makeBaseQuery();
        $params['size'] = $this->getSize();
        $params['body']['query']['multi_match']['query'] = $keyword;
        //Lets the query mismatch by one or two characters which is pretty cool! Doesn't activate on short queries.
        $params['body']['query']['multi_match']['fuzziness'] = 'AUTO';
        $params['body']['query']['multi_match']['fields'] = CMSRecord::getSearchableFields();
        $response = new CMSRecordSearchResult($this->searchClient->search($params), $keyword);
        return $response;
    }
}
