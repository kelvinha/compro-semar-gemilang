"use strict";
function floatchart() {
    new ApexCharts(document.querySelector("#invoice-chart"), {
        chart: { height: 350, type: "line", toolbar: { show: !1 } },
        plotOptions: { bar: { columnWidth: "50%" } },
        legend: { show: !1 },
        stroke: { width: [0, 2], curve: "smooth" },
        stroke: { width: [0, 2], curve: "smooth" },
        dataLabels: { enabled: !1 },
        series: [
            {
                name: "TEAM A",
                type: "column",
                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30, 25],
            },
            {
                name: "TEAM B",
                type: "line",
                data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39, 35],
            },
        ],
        fill: {
            type: "gradient",
            gradient: {
                inverseColors: !1,
                shade: "light",
                type: "vertical",
                opacityFrom: [0, 1],
                opacityTo: [0.5, 1],
                stops: [0, 100],
                hover: {
                    inverseColors: !1,
                    shade: "light",
                    type: "vertical",
                    opacityFrom: 0.15,
                    opacityTo: 0.65,
                    stops: [0, 96, 100],
                },
            },
        },
        markers: {
            size: 3,
            colors: "#fFF",
            strokeColors: "#e58a00",
            strokeWidth: 2,
            shape: "circle",
            hover: { size: 5 },
        },
        colors: ["#e58a00", "#e58a00"],
        labels: [
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
            "Dec",
        ],
        yaxis: { tickAmount: 3 },
        grid: { show: !0, borderColor: "#00000010" },
        xaxis: {
            axisBorder: { show: !1 },
            axisTicks: { show: !1 },
            tickAmount: 11,
        },
    }).render(),
        new ApexCharts(document.querySelector("#total-income-graph"), {
            chart: { height: 280, type: "donut" },
            series: [27, 23, 20, 17],
            colors: ["#e58a00", "#2ca87f", "#dc2626", "#1C582C"],
            labels: ["Pending", "Paid", "Overdue", "Draft"],
            fill: { opacity: [1, 1, 1, 0.3] },
            legend: { show: !1 },
            plotOptions: {
                pie: {
                    donut: {
                        size: "65%",
                        labels: {
                            show: !0,
                            name: { show: !0 },
                            value: { show: !0 },
                        },
                    },
                },
            },
            dataLabels: { enabled: !1 },
            responsive: [
                {
                    breakpoint: 575,
                    options: {
                        chart: { height: 250 },
                        plotOptions: {
                            pie: {
                                donut: { size: "65%", labels: { show: !1 } },
                            },
                        },
                    },
                },
            ],
        }).render();
}
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        floatchart();
    }, 500);
});
