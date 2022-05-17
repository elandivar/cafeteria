<?php

namespace App\Http\Controllers\Admin\Charts;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

/**
 * Class RotationChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RotationChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        $obj = new \App\Models\CashRegisterClosure();
        $resCashRegisterClosure = $obj->get();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels([
            'Today',
        ]);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/rotation'));

        // OPTIONAL
        $this->chart->minimalist(false);
        $this->chart->displayLegend(true);

        $cant_relleno = 14 - count($resCashRegisterClosure);
        $arrLabels   = array_fill(0,$cant_relleno,"");            
        $arrDataCash = array_fill(0,$cant_relleno,"");
        $arrDataCC   = array_fill(0,$cant_relleno,"");
        foreach($resCashRegisterClosure as $rclosure) {
            $rclosure_attributes = $rclosure->getAttributes();
            $date = date_create($rclosure_attributes['date']);
            $arrLabels[] = date_format($date, 'M-d');
            $arrDataCash[] = $rclosure_attributes['amount_cash'];
            $arrDataCC[] = $rclosure_attributes['amount_cc'];
        }

        $this->chart->labels($arrLabels);
        $this->chart->dataset('Cash', 'line', $arrDataCash)->color('rgba(18, 152, 219, 0.8)')->backgroundColor('rgba(18, 152, 219, 0.3)');
        $this->chart->dataset('CC', 'line', $arrDataCC);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    // public function data()
    // {
    //     $users_created_today = \App\User::whereDate('created_at', today())->count();

    //     $this->chart->dataset('Users Created', 'bar', [
    //                 $users_created_today,
    //             ])
    //         ->color('rgba(205, 32, 31, 1)')
    //         ->backgroundColor('rgba(205, 32, 31, 0.4)');
    // }
}