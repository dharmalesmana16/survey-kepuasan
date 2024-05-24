import './bootstrap';
import Alpine from 'alpinejs';
import 'bootstrap';
import Highcharts from 'highcharts';
import flatpickr from 'flatpickr';
// var Highcharts = require('highcharts/highstock');
let grafikBar = Highcharts.chart('barChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Jawaban per hari ini'
    },
    xAxis: {
        categories: ['Sangat Puas', 'Puas', 'Cukup Puas',"Kurang Puas","Buruk"]
    },
    yAxis: {
        title: {
            text: 'Total'
        }
    },
    series: [{
        // name: 'Jane',
        data: []
    },]
});
(function (H) {
    H.seriesTypes.pie.prototype.animate = function (init) {
        const series = this,
            chart = series.chart,
            points = series.points,
            {
                animation
            } = series.options,
            {
                startAngleRad
            } = series;

        function fanAnimate(point, startAngleRad) {
            const graphic = point.graphic,
                args = point.shapeArgs;

            if (graphic && args) {

                graphic
                    // Set inital animation values
                    .attr({
                        start: startAngleRad,
                        end: startAngleRad,
                        opacity: 1
                    })
                    // Animate to the final position
                    .animate({
                        start: args.start,
                        end: args.end
                    }, {
                        duration: animation.duration / points.length
                    }, function () {
                        // On complete, start animating the next point
                        if (points[point.index + 1]) {
                            fanAnimate(points[point.index + 1], args.end);
                        }
                        // On the last point, fade in the data labels, then
                        // apply the inner size
                        if (point.index === series.points.length - 1) {
                            series.dataLabelsGroup.animate({
                                opacity: 1
                            },
                            void 0,
                            function () {
                                points.forEach(point => {
                                    point.opacity = 1;
                                });
                                series.update({
                                    enableMouseTracking: true
                                }, false);
                                chart.update({
                                    plotOptions: {
                                        pie: {
                                            innerSize: '40%',
                                            borderRadius: 8
                                        }
                                    }
                                });
                            });
                        }
                    });
            }
        }

        if (init) {
            // Hide points on init
            points.forEach(point => {
                point.opacity = 0;
            });
        } else {
            fanAnimate(points[0], startAngleRad);
        }
    };
}(Highcharts));

let grafikPie = Highcharts.chart('pieChart', {
    chart: {
        type: 'pie'
    },
    credits:false,
    // categories:["Sangat Puas"],
    title: {
        text: 'Jawaban berdasarkan persentase',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: ''
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            borderWidth: 2,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br>{point.percentage:.1f}%',
                distance: 20
            }
        }
    },
    series: [{
        // Disable mouse tracking on load, enable after custom animation
        enableMouseTracking: false,
        animation: {
            duration: 2000
        },
        colorByPoint: true,
        data: [{
            name: 'Sangat Puas',
            // y: 0    
        }, {
            name: 'Puas',
            // y: 0
        }, {
            name: 'Cukup Puas',
            // y: 0
        }, {
            name: 'Kurang Puas',
            // y: 0
        }, {
            name: 'Buruk',
            // y: 0
        }]
    }]
});

window.Alpine = Alpine;

Alpine.start();

export{
    grafikPie,
    grafikBar
}