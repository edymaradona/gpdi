<?php

use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */

$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
$this->params['alert'] =
    \kartik\widgets\Alert::widget([
        'type' => \kartik\widgets\Alert::TYPE_SUCCESS,
        'title' => 'Well done!',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'You successfully read this important alert message.',
        'showSeparator' => true,
        'delay' => 2000
    ]);


?>

<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Pastor</h2>
                <?= Highcharts::widget([
                    'options' => '
                                {
                                        "title": {
                                            "text": "Congregation Growth",
                                            "x": -20 
                                        },
                                        "subtitle": {
                                            "text": "MD Jabar 2016",
                                            "x": -20
                                        },
                                        "xAxis": {
                                            "categories": ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                                                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                                        },
                                        "yAxis": {
                                            "title": {
                                                "text": "Total"
                                            },
                                            "plotLines": [{
                                                "value": 0,
                                                "width": 1,
                                                "color": "#808080"
                                            }]
                                        },
                                        "tooltip": {
                                            "valueSuffix": ""
                                        },
                                        "legend": {
                                            "layout": "vertical",
                                            "align": "right",
                                            "verticalAlign": "middle",
                                            "borderWidth": 0
                                        },
                                        "series": [{
                                            "name": "Wil. I",
                                            "data": [70, 75, 95, 145, 182, 215, 252, 265, 283, 303, 319, 356]
                                        }, {
                                            "name": "Wil. II",
                                            "data": [52, 58, 60, 113, 170, 220, 248, 241, 251, 261, 286, 300]
                                        }, {
                                            "name": "Wil. III",
                                            "data": [90, 106, 135, 184, 235, 270, 386, 479, 543, 590, 639, 710]
                                        }, {
                                            "name": "Wil. IV",
                                            "data": [39, 42, 57, 85, 119, 152, 170, 266, 342, 403, 466, 548]
                                        }]
                                    }
                                '
                ]);
                ?>
            </div>
            <div class="col-lg-6">
                <h2>Comparison</h2>
                <?= Highcharts::widget([
                    'options' => '
                            {
                                "chart": {
                                    "type": "column"
                                },
                                "title": {
                                    "text": "Monthly Average Attend"
                                },
                                "subtitle": {
                                    "text": "MD Jabar 2016"
                                },
                                "xAxis": {
                                    "categories": [
                                        "Jan",
                                        "Feb",
                                        "Mar",
                                        "Apr",
                                        "May",
                                        "Jun",
                                        "Jul",
                                        "Aug",
                                        "Sep",
                                        "Oct",
                                        "Nov",
                                        "Dec"
                                    ],
                                    "crosshair": true
                                },
                                "yAxis": {
                                    "min": 0,
                                    "title": {
                                        "text": "Rainfall (mm)"
                                    }
                                },
                                "plotOptions": {
                                    "column": {
                                        "pointPadding": 0.2,
                                        "borderWidth": 0
                                    }
                                },
                                "series": [{
                                    "name": "Tokyo",
                                    "data": [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                            
                                }, {
                                    "name": "New York",
                                    "data": [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
                            
                                }, {
                                    "name": "London",
                                    "data": [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
                            
                                }, {
                                    "name": "Berlin",
                                    "data": [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
                            
                                }]
                            }
                        '
                ]);
                ?>

            </div>
        </div>

    </div>
</div>
