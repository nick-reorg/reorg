<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 5:08 PM
 */

namespace App\Http\Packages\CMS\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Packages\CMS\Gateways\CMSGateway;
use App\Http\Packages\CMS\Gateways\CMSRecordSearchGateway;
use App\Http\Packages\CMS\Models\CMSRecordXLSBuilder;
use App\Jobs\SaveCMSData;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class CMSRecordController
 * @package App\Http\Packages\CMS\Controllers
 */
class CMSRecordController extends Controller
{
    use DispatchesJobs;

    /**
     * @var CMSGateway
     */
    private $gateway;

    /**
     * @var CMSRecordSearchGateway
     */
    private $searchGateway;

    /**
     * @var int
     */
    private $status = Controller::RESPONSE_SUCCESS;

    /**
     * CMSRecordController constructor.
     * @param Request $request
     * @param CMSGateway $gateway
     * @param CMSRecordSearchGateway $searchGateway
     */
    public function __construct(Request $request, CMSGateway $gateway, CMSRecordSearchGateway $searchGateway)
    {
        parent::__construct($request);
        $this->gateway = $gateway;
        $this->searchGateway = $searchGateway;
    }

    /**
     * POST /api/cms
     */
    public function store()
    {
        $dates = array();
        $response = array();
        $start = new Carbon($this->request->get('start'));
        $end = $this->request->get('end', null);

        //These can be huge so we'll fetch each day as a separate job. First we need each day as a string.
        if ($end !== null) {
            $end = new Carbon($end);
            for ($date = $start; $date->lte($end); $date->addDay()) {
                $dates[] = $date->format(CMSGateway::DATE_FORMAT);
            }
        } else {
            $dates[] = $start->format(CMSGateway::DATE_FORMAT);
        }

        //Dispatch a job for each Date.
        foreach ($dates as $date) {
            $this->dispatch(new SaveCMSData($date));
        }

        //Not much to send back in the API since everything is being done asynchronously. Just give them the dates.
        $response['dates_to_fetch'] = $dates;

        return new Response($response, $this->status);
    }

    /**
     * GET /api/cms
     *
     * @return Response
     */
    public function get()
    {
        $keyword = $this->request->get('keyword');
        $result = $this->searchGateway->search($keyword);
        return new Response($result, $this->status);
    }

    /**
     * GET api/cms/file
     */
    public function getFile()
    {
        $keyword = $this->request->get('keyword');
        $records = $this->searchGateway->search($keyword);
        $file = CMSRecordXLSBuilder::buildXLS($records);
        return response()->download($file->getPath(), $file->getName())->deleteFileAfterSend(true);
    }
}
