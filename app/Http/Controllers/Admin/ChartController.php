<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ChartController extends Controller
{
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Orders by Weeks',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 7,
        ];

        $chartDay = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Orders by Months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'filter_field' => 'created_at',
        ];

        $chartMonth = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Orders by Years',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'year',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
        ];

        $chartYear = new LaravelChart($chart_options);

        return view('admin.chart.index', compact('chartDay', 'chartMonth', 'chartYear'));
    }
}
