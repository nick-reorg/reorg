<?php

namespace App\Jobs;

use App\Http\Packages\CMS\Support\CMSServiceProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
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
