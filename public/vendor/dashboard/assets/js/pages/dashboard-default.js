"use strict";
function floatchart() {
    new ApexCharts(document.querySelector("#all-earnings-graph"), {
        chart: { type: "bar", height: 50, sparkline: { enabled: !0 } },
        colors: ["#1C582C"],
        plotOptions: { bar: { columnWidth: "80%" } },
        series: [{ data: [10, 30, 40, 20, 60, 50, 20, 15, 20, 25, 30, 25] }],
        xaxis: { crosshairs: { width: 1 } },
        tooltip: {
            fixed: { enabled: !1 },
            x: { show: !1 },
            y: {
                title: {
                    formatter: function (e) {
                        return "";
                    },
                },
            },
            marker: { show: !1 },
        },
    }).render(),
        new ApexCharts(document.querySelector("#page-views-graph"), {
            chart: { type: "bar", height: 50, sparkline: { enabled: !0 } },
            colors: ["#E58A00"],
            plotOptions: { bar: { columnWidth: "80%" } },
            series: [
                { data: [10, 30, 40, 20, 60, 50, 20, 15, 20, 25, 30, 25] },
            ],
            xaxis: { crosshairs: { width: 1 } },
            tooltip: {
                fixed: { enabled: !1 },
                x: { show: !1 },
                y: {
                    title: {
                        formatter: function (e) {
                            return "";
                        },
                    },
                },
                marker: { show: !1 },
            },
        }).render(),
        new ApexCharts(document.querySelector("#total-task-graph"), {
            chart: { type: "bar", height: 50, sparkline: { enabled: !0 } },
            colors: ["#2CA87F"],
            plotOptions: { bar: { columnWidth: "80%" } },
            series: [
                { data: [10, 30, 40, 20, 60, 50, 20, 15, 20, 25, 30, 25] },
            ],
            xaxis: { crosshairs: { width: 1 } },
            tooltip: {
                fixed: { enabled: !1 },
                x: { show: !1 },
                y: {
                    title: {
                        formatter: function (e) {
                            return "";
                        },
                    },
                },
                marker: { show: !1 },
            },
        }).render(),
        new ApexCharts(document.querySelector("#download-graph"), {
            chart: { type: "bar", height: 50, sparkline: { enabled: !0 } },
            colors: ["#DC2626"],
            plotOptions: { bar: { columnWidth: "80%" } },
            series: [
                { data: [10, 30, 40, 20, 60, 50, 20, 15, 20, 25, 30, 25] },
            ],
            xaxis: { crosshairs: { width: 1 } },
            tooltip: {
                fixed: { enabled: !1 },
                x: { show: !1 },
                y: {
                    title: {
                        formatter: function (e) {
                            return "";
                        },
                    },
                },
                marker: { show: !1 },
            },
        }).render(),
        new ApexCharts(document.querySelector("#customer-rate-graph"), {
            chart: { type: "area", height: 300, toolbar: { show: !1 } },
            colors: ["#1C582C"],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    type: "vertical",
                    inverseColors: !1,
                    opacityFrom: 0.5,
                    opacityTo: 0,
                },
            },
            dataLabels: { enabled: !1 },
            stroke: { width: 1 },
            plotOptions: { bar: { columnWidth: "45%", borderRadius: 4 } },
            grid: { strokeDashArray: 4 },
            series: [
                { data: [30, 60, 40, 70, 50, 90, 50, 55, 45, 60, 50, 65] },
            ],
            xaxis: {
                categories: [
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
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
        }).render(),
        new ApexCharts(document.querySelector("#total-tasks-graph"), {
            chart: {
                type: "area",
                height: 60,
                stacked: !0,
                sparkline: { enabled: !0 },
            },
            colors: ["#1C582C"],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    type: "vertical",
                    inverseColors: !1,
                    opacityFrom: 0.5,
                    opacityTo: 0,
                },
            },
            stroke: { curve: "smooth", width: 2 },
            series: [{ data: [5, 25, 3, 10, 4, 50, 0] }],
        }).render(),
        new ApexCharts(document.querySelector("#pending-tasks-graph"), {
            chart: {
                type: "area",
                height: 60,
                stacked: !0,
                sparkline: { enabled: !0 },
            },
            colors: ["#DC2626"],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    type: "vertical",
                    inverseColors: !1,
                    opacityFrom: 0.5,
                    opacityTo: 0,
                },
            },
            stroke: { curve: "smooth", width: 2 },
            series: [{ data: [0, 50, 4, 10, 3, 25, 5] }],
        }).render(),
        new ApexCharts(document.querySelector("#total-income-graph"), {
            chart: { height: 320, type: "donut" },
            series: [27, 23, 20, 17],
            colors: ["#1C582C", "#E58A00", "#2CA87F", "#1C582C"],
            labels: ["Total income", "Total rent", "Download", "Views"],
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
                    breakpoint: 480,
                    options: {
                        plotOptions: {
                            pie: {
                                donut: { size: "65%", labels: { show: !0 } },
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
