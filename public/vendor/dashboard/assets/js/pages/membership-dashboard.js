"use strict";
function floatchart() {
    new ApexCharts(document.querySelector("#revenue-analytics-chart"), {
        chart: { type: "area", height: 300, toolbar: { show: !1 } },
        colors: ["#e58a00", "#1C582C"],
        dataLabels: { enabled: !1 },
        legend: { show: !0, position: "top" },
        markers: {
            size: 1,
            colors: ["#fff", "#fff", "#fff"],
            strokeColors: ["#e58a00", "#1C582C"],
            strokeWidth: 1,
            shape: "circle",
            hover: { size: 4 },
        },
        stroke: { width: 1, curve: "smooth" },
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
        grid: { show: !1 },
        series: [
            {
                name: "Revenue",
                data: [
                    200, 320, 320, 275, 275, 400, 400, 300, 440, 320, 320, 275,
                    275, 400, 300, 440,
                ],
            },
            {
                name: "Sales",
                data: [
                    200, 250, 240, 300, 340, 320, 320, 400, 350, 250, 240, 300,
                    340, 320, 400, 350,
                ],
            },
        ],
        xaxis: {
            labels: { hideOverlappingLabels: !0 },
            axisBorder: { show: !1 },
            axisTicks: { show: !1 },
        },
    }).render(),
        new ApexCharts(document.querySelector("#membership-state-chart"), {
            series: [76],
            chart: {
                type: "radialBar",
                offsetY: -20,
                sparkline: { enabled: !0 },
            },
            colors: ["#1C582C"],
            plotOptions: {
                radialBar: {
                    startAngle: -95,
                    endAngle: 95,
                    hollow: { margin: 15, size: "40%" },
                    track: {
                        background: "#1C582C25",
                        strokeWidth: "97%",
                        margin: 10,
                    },
                    dataLabels: {
                        name: { show: !1 },
                        value: { offsetY: 0, fontSize: "20px" },
                    },
                },
            },
            grid: { padding: { top: 10 } },
            stroke: { lineCap: "round" },
            labels: ["Average Results"],
        }).render(),
        new ApexCharts(document.querySelector("#activity-line-chart"), {
            chart: { type: "line", height: 150, toolbar: { show: !1 } },
            colors: ["#2ca87f", "#2ca87f"],
            dataLabels: { enabled: !1 },
            legend: { show: !0, position: "top" },
            markers: {
                size: 1,
                colors: ["#fff", "#fff"],
                strokeColors: ["#2ca87f", "#2ca87f"],
                strokeWidth: 1,
                shape: "circle",
                hover: { size: 4 },
            },
            fill: { opacity: [1, 0.3] },
            stroke: { width: 3, curve: "smooth" },
            grid: { show: !1 },
            series: [
                { name: "Active", data: [20, 90, 65, 85, 20, 80, 30] },
                { name: "Inactive", data: [70, 30, 40, 15, 60, 40, 95] },
            ],
            xaxis: {
                labels: { hideOverlappingLabels: !0 },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
        }).render();
}
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        floatchart();
    }, 500);
});
