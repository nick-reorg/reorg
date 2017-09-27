<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 10:51 PM
 */

namespace App\Http\Packages\CMS\Models;

use App\Http\Packages\CMS\Gateways\CMSGateway;
use Carbon\Carbon;
use PHPExcel;
use PHPExcel_IOFactory;

/**
 * Class CMSRecordXLSBuilder
 * @package App\Http\Packages\CMS\Models
 */
class CMSRecordXLSBuilder
{
    const PATH = '../storage/export/xls/';

    /**
     * @param CMSRecordSearchResult $records
     * @return CMSSearchFile
     */
    public static function buildXLS(CMSRecordSearchResult $records)
    {
        $now = new Carbon();
        $now = $now->format(CMSGateway::DATE_FORMAT);
        $name = 'cmsrecords' . '-' . $now . '_' . $records->getKeyword() . '.xls';

        $xls = new PHPExcel();
        $xls->getProperties()->setCreator('Greg Sciarretta');
        $xls->getProperties()->setLastModifiedBy('Greg Sciarretta');
        $xls->getProperties()->setTitle($name);
        $xls->getProperties()->setSubject($records->getKeyword());
        $xls->setActiveSheetIndex(0);
        //Write Column Names
        $xls->getActiveSheet()->fromArray(array_keys($records->getRecords()[0]->toArray()), null, 'A1');
        $xls->getActiveSheet()->fromArray($records->getRecordsAsArrays(), null, 'A2');

        $writer = PHPExcel_IOFactory::createWriter($xls, 'Excel5');
        $writer->save(self::PATH . $name);
        $file = new CMSSearchFile($name, self::PATH . $name);
        return $file;
    }
}
