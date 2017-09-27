<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 9:25 PM
 */

namespace App\Http\Packages\ElasticSearch\Contracts;

/**
 * Interface ScorableInterface
 * @package App\Http\Packages\ElasticSearch\Contracts
 */
interface ScorableInterface
{
    /**
     * @param float $score
     */
    public function setScore($score);

    /**
     * @return float
     */
    public function getScore();
}
