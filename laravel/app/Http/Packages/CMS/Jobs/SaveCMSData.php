<?php

namespace App\Jobs;

use App\Http\Packages\CMS\Support\CMSServiceProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * This class us meant to be super light and only call high level functions of other classes.
 *
 * Class SaveCMSData
 * @package App\Jobs
 */
class SaveCMSData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $date;

    /**
     * SaveCMSData constructor.
     * @param $date
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $records = CMSServiceProvider::getCMSGateway()->fetchRecords($this->date);
        CMSServiceProvider::getCMSRecordSearchGateway()->bulkIndex($records);
    }
}
