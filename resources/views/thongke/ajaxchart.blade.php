<div id="chart">
</div>
<script type="text/javascript">
    var options = {
        chart: {
            height: 300,
            type: "line",
            stacked: false
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#b53f3f", "#b39839", "#155cbe", "#41b53f"],
        series: [@php foreach($thongkes as $thongke) {
                $data = implode(',', $thongke['data']);
                echo "{";
                echo 'name:"'.$thongke['name'].
                '",';
                echo "data:[".$data.
                "]";
                echo "},";
            }
            @endphp
        ],
        stroke: {
            width: [4, 4]
        },
        plotOptions: {
            bar: {
                columnWidth: "20%"
            }
        },
        xaxis: {
            categories: [@php foreach($months as $month) {
                    echo $month.
                    ",";
                }
                @endphp
            ]
        },
        yaxis: [{
            axisTicks: {
                show: true
            },
            axisBorder: {
                show: true,
                color: "black"
            },
            labels: {
                style: {
                    colors: "black"
                }
            },
            title: {
                text: "Series A",
                style: {
                    color: "black"
                }
            }
        }, ],
        tooltip: {
            shared: false,
            intersect: true,
            x: {
                show: false
            }
        },
        legend: {
            horizontalAlign: "left",
            offsetX: 40
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>