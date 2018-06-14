<?php

namespace Rubix\Engine\CrossValidation\Reports;

use Rubix\Engine\Estimator;
use Rubix\Engine\Datasets\Labeled;

class AggregateReport implements Report
{
    /**
     * The report middleware stack. i.e. the reports to generate when the reports
     * method is called.
     *
     * @var array
     */
    protected $reports = [
        //
    ];

    /**
     * @param  array  $reports
     * @return void
     */
    public function __construct(array $reports)
    {
        foreach ($reports as $index => $report) {
            $this->addReport($report, $index);
        }
    }

    /**
     * Generate an aggregated report consisting of 1 or more individual reports.
     *
     * @param  \Rubix\Engine\Estimator  $estimator
     * @param  \Runix\Engine\Datasets\Labeled  $testing
     * @return array
     */
    public function generate(Estimator $estimator, Labeled $testing) : array
    {
        $reports = [];

        foreach ($this->reports as $index => $report) {
            $reports[$index] = $report->generate($estimator, clone $testing);
        }

        return $reports;
    }

    /**
     * Add a report to the stack.
     *
     * @param  \Rubix\Engine\ModelSeletion\Reports\Report  $report
     * @param  mixed  $index
     * @return void
     */
    public function addReport(Report $report, $index) : void
    {
        $this->reports[$index] = $report;
    }
}