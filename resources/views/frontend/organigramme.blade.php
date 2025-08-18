@extends('frontend.layouts.app')
@section('title')
    <title>Organigramme |AMDD</title>
@endsection
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        @if (app()->getLocale() == 'ar')
            <div class="parallax">
                <div class="breadcrumbs" data-aos="fade-in">
                    <div class="container">
                        <h2>@lang('messages.Organigramme de L\'Association Marocaine de Développement Digital')</h2>
                    </div>
                </div><!-- End Breadcrumbs -->
            </div>
        @elseif(app()->getLocale() == 'fr')
            <div class="parallax">
                <div class="breadcrumbs" data-aos="fade-in">
                    <div class="container">
                        <h2>@lang('messages.Organigramme de L\'Association Marocaine de Développement Digital')</h2>
                    </div>
                </div><!-- End Breadcrumbs -->
            </div>
        @endif
        <!-- ======= organigramme ======= -->
        <section id="organigramme">
            @if (app()->getLocale() == 'ar')
                <div class="container" data-aos="fade-up" dir="rtl">
                    <div class="row">
                        <div class="section-title">
                            <p>@lang('messages.Organigramme Association')</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center"
                            style="height:fit-content; width:100%">
                            <div id="chartDiv" style="width: 100%; height: 400px; margin: 0px auto; overflow: hidden">
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(app()->getLocale() == 'fr')
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="section-title">
                            <p>@lang('messages.Organigramme Association')</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center"
                            style="height:fit-content; width:100%">
                            <div id="chartDiv" style="width: 100%; height: 400px; margin: 0px auto; overflow: hidden">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
        <section id="organigramme2">
            @if (app()->getLocale() == 'ar')
                <div class="container" data-aos="fade-up" dir="rtl">
                    <div class="row">
                        <div class="section-title">
                            <p>@lang('messages.Organigramme ComitéS')</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center"
                            style="height:fit-content; width:100%">

                            <div id="chartDiv2" style="width: 100%; height: 400px; margin: 0px auto; overflow: hidden">

                            </div>
                        </div>
                    </div>
                </div>
            @elseif (app()->getLocale() == 'fr')
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="section-title">
                            <p>@lang('messages.Organigramme ComitéS')</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center"
                            style="height:fit-content; width:100%">

                            <div id="chartDiv2" style="width: 100%; height: 400px; margin: 0px auto; overflow: hidden">

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
        <!-- End organigramme -->
    </main><!-- End #main -->
    <style>
        .parallax {
            background-image: url('../frontend/img/hero1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            opacity: inherit;
        }

        .breadcrumbs {
            background: rgba(0, 0, 0, 0.4) url(../frontend/img/pattern.png) repeat;
            padding: 91px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            background-color: #fff;

        }

        #pro {
            background-color: var(--primary);
            color: white;
            font-weight: 600
        }

        @media (max-width:700px) {
            table {
                width: auto !important;
                height: auto !important;
            }

        }


        td.no-border-bottom {
            border-bottom: none;
        }

        .personDescription {
            background-color: #eeeeee;
            padding: 6px;
            border-radius: 6px;
            margin-top: -4px;
        }

        .tooltipBox {
            background-color: #666666;
            color: white;
            border-radius: 4px;
            padding: 4px;
        }
    </style>
    <script>
        var chart;

        JSC.fetch('orgData.csv')
            .then(function(response) {
                return response.text();
            })
            .then(function(text) {
                var data = JSC.csv2Json(text);
                chart = renderChart1(makeSeries1(data));
            });

        function renderChart1(series) {
            return JSC.chart('chartDiv', {
                type: 'organizational down',
                defaultTooltip: {
                    asHTML: true,
                    outline: 'none',
                    zIndex: 10
                },
                defaultPoint: {
                    focusGlow: false,
                    connectorLine: {
                        width: 1,
                        color: '#e0e0e0'
                    },
                    tooltip: '<div class="tooltipBox">Name: <b>%name</b><br>Membre: <b>%position</b></div>',
                    annotation: {
                        padding: 3,
                        asHTML: true,
                        margin: [12, 2],
                        label: {
                            text: '<img width=100 height=100 margin_bottom=4 src=%photo><br/><div class="personDescription"><b>%position</b><br/>%name<br/></div>',
                            autoWrap: false
                        }
                    },
                    outline_width: 0,
                    color: '#333333'
                },
                series: series
            });
        }

        function makeSeries1(data) {
            return [{
                points: data.map(function(item) {
                    return {
                        name: item.name,
                        id: item.id,
                        parent: item.parent,
                        attributes: {
                            position: '<span style="font-size:13px;">' +
                                item.position +
                                '</span>',
                            photo: 'frontend/img/avatar/' + item.photo + '.png'
                        }
                    };
                })
            }];
        }
        //===============================================//
        // JS
        var chart2;

        JSC.fetch('orggData.csv')
            .then(function(response) {
                return response.text();
            })
            .then(function(text) {
                var data = JSC.csv2Json(text);
                chart2 = renderChart(makeSeries(data));
            });

        function renderChart(series) {
            return JSC.chart('chartDiv2', {
                type: 'organizational down',
                defaultTooltip: {
                    asHTML: true,
                    outline: 'none',
                    zIndex: 10
                },
                defaultPoint: {
                    focusGlow: false,
                    connectorLine: {
                        width: 1,
                        color: '#0080c9'
                    },
                    tooltip: '<div class="tooltipBox"><br>Name: <b>%name</b><br>Memebr: <b>%position</b></div>',
                    annotation: {
                        padding: 3,
                        asHTML: true,
                        margin: [12, 2],
                        label: {
                            text: '<img width=64 height=64 margin_bottom=4 src=%photo><br/><div class="personDescription"><b>%position</b><br/>%name<br/></div>',
                            autoWrap: false
                        }
                    },
                    outline_width: 0,
                    color: '#333333'
                },
                series: series
            });
        }

        function makeSeries(data) {
            return [{
                points: data.map(function(item) {
                    return {
                        name: item.name,
                        id: item.id,
                        parent: item.parent,
                        attributes: {
                            position: '<span style="font-size:13px;">' +
                                item.position +
                                '</span>',
                            name: item.name,
                            address: item.address,
                            photo: 'frontend/img/comite/' + item.photo + '.png'
                        }
                    };
                })
            }];
        }
        /**Site Source of picturs */

        //https://jscharting.com/samples/images/avatar1.png
        /**Make Image round */
        //https://www.quickpicturetools.com/en/rounded_corners/
        //..//amdd/Resources/assets/img/association
        //'..//amdd/images/ceo.png'
    </script>
@endsection
