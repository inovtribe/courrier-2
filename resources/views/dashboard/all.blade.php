@extends('layouts.base')

@section('content')

    <div class="container" style="display: none">
        <div class="offset-2 col-8">
            <div class="col-12">
                <p style="text-align: right">12 Dec. 2019</p>
            </div>
            <div class="col-12">
                <p>
                    Steph Cyrille <br />
                    Agent du courrier <br />
                    stephcyril.sc@gmail.com <br />
                    Service du Courrier<br />
                </p>
            </div>
            <div class="col-12">
                <p style="text-align: right">A monsieur John Doe</p>
            </div>
            <div class="col-12">
                <p style="text-align: justify">
                    Monsieur, je viens au près de vous aujourd'hui lorem ipsum dollor all suiluim dor rol
                    de vous aujourd'hui lorem ipsum dollor all suiluim dor rol de vous aujourd'hui lore
                    de vous aujourd'hui lorem ipsum dollor all suiluim dor rol de vous aujourd'hui lore
                    de vous aujourd'hui lorem ipsum dollor all suiluim dor rol de vous aujourd'hui lore<br />
                </p>
                <p style="text-align: justify">
                    lorem ipsum dollor all suiluim dor rol lorem ipsum dollor all suiluim gor fout loram
                    de vous aujourd'hui lorem ipsum dollor all suiluim dor rol de vous aujourd'hui lore
                    de vous aujourd'hui lorem ipsum dollor all suiluim dor rol de vous aujourd'hui lore
                    de vous aujourd'hui lorem ipsum dollor all suiluim dor rol de vous aujourd'hui lore<br />
                </p>
                <p style="text-align: justify">
                    de vous aujourd'hui lorem ipsum dollor all suiluim dor rol de vous aujourd'hui lore
                    de vous aujourd'hui lorem ipsum dollor all suiluim dor rol de vous aujourd'hui lore<br />
                </p>
            </div>

            <div class="col-12">
                <p style="">Cordialement</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <figure class="highcharts-figure">
                <div id="container3"></div>
                {{-- <p class="highcharts-description">
                    A demo showing a stacked area chart, also sometimes referred to as a
                    mountain chart. In a stacked chart, the data series values are added
                    together to make up a total.
                </p> --}}
            </figure>
        </div>
        <div class="col-5">
            <div id="container2" style="min-width: 310px; max-width: 800px;height: 400px;margin: 0 auto"></div>
        </div>
        <div class="col-12" style="padding-top: 30px">
            <div id="container1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div>
    </div>
    
@endsection

@section('customJS')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <script>
        Highcharts.chart('container1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Tous les courriers'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Pourcentage',
                colorByPoint: true,
                data: [{
                    name: 'Courriers traités',
                    y: 45.41,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Courriers en cours de traitement',
                    y: 21.84
                }, {
                    name: 'Courriers archivés',
                    y: 24.59
                },
                {
                    name: 'Supprimé',
                    y: 8.61
                }]
            }]
        });


        Highcharts.chart('container2', {

            title: {
                text: 'Courriers enregistrés par période'
            },

            // subtitle: {
            //     text: 'Source: thesolarfoundation.com'
            // },

            yAxis: {
                title: {
                    text: 'Number of Employees'
                }
            },
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2012
                }
            },

            series: [{
                name: 'Arrivés',
                data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
            }, {
                name: 'Internes',
                data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
            }, {
                name: 'Départ',
                data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

            });


            Highcharts.chart('container3', {
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'Courriers créés par service'
                },
                // subtitle: {
                //     text: 'Source: Wikipedia.org'
                // },
                xAxis: {
                    categories: ['Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                    tickmarkPlacement: 'on',
                    title: {
                        enabled: false
                    }
                },
                yAxis: {
                    title: {
                        text: 'Centaines'
                    },
                    labels: {
                        formatter: function () {
                            return this.value / 1000;
                        }
                    }
                },
                tooltip: {
                    split: true,
                    valueSuffix: ' '
                },
                plotOptions: {
                    area: {
                        stacking: 'normal',
                        lineColor: '#666666',
                        lineWidth: 1,
                        marker: {
                            lineWidth: 1,
                            lineColor: '#666666'
                        }
                    }
                },
                series: [{
                    name: 'DSI',
                    data: [502, 635, 709, 747, 802, 1104, 2068]
                },  {
                    name: 'SG',
                    data: [1766, 807, 911, 733, 621, 767, 1766]
                },  
                {
                    name: 'DRH',
                    data: [163, 203, 276, 408, 547, 729, 628]
                }, {
                    name: 'DAG',
                    data: [106, 107, 111, 133, 221, 767, 1766]
                }, 
                {
                    name: 'DAF',
                    data: [18, 31, 54, 156, 339, 818, 1201]
                },
                {
                    name: 'SADL',
                    data: [106, 107, 111, 133, 221, 767, 1766]
                }]
            });
    </script>
@endsection