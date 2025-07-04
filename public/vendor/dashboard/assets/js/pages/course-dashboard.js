"use strict";
function floatchart() {
    new ApexCharts(document.querySelector("#revenue-sales-chart"), {
        chart: { type: "area", height: 250, toolbar: { show: !1 } },
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
        stroke: { width: 2, curve: "smooth" },
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
        new ApexCharts(document.querySelector("#invites-goal-chart"), {
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
                    hollow: { margin: 15, size: "50%" },
                    track: {
                        background: "#eaeaea",
                        strokeWidth: "97%",
                        margin: 20,
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
        }).render();
    var e = {
        chart: { type: "bar", height: 210, toolbar: { show: !1 } },
        plotOptions: { bar: { columnWidth: "60%", borderRadius: 3 } },
        stroke: { show: !0, width: 3, colors: ["transparent"] },
        dataLabels: { enabled: !1 },
        legend: {
            position: "top",
            horizontalAlign: "right",
            show: !0,
            fontFamily: "'Public Sans', sans-serif",
            offsetX: 10,
            offsetY: 10,
            labels: { useSeriesColors: !1 },
            markers: {
                width: 10,
                height: 10,
                radius: "50%",
                offsexX: 2,
                offsexY: 2,
            },
            itemMargin: { horizontal: 15, vertical: 5 },
        },
        colors: ["#1C582C", "#ffa21d"],
        series: [
            {
                name: "Net Profit",
                data: [
                    180, 90, 135, 114, 120, 145, 180, 90, 135, 114, 120, 145,
                ],
            },
            {
                name: "Revenue",
                data: [120, 45, 78, 150, 168, 99, 120, 45, 78, 150, 168, 99],
            },
        ],
        grid: { borderColor: "#00000010" },
        yaxis: { show: !1 },
    };
    new ApexCharts(
        document.querySelector("#course-report-bar-chart"),
        e
    ).render(),
        new ApexCharts(document.querySelector("#total-revenue-line-1-chart"), {
            chart: { type: "line", height: 60, sparkline: { enabled: !0 } },
            dataLabels: { enabled: !1 },
            colors: ["#2ca87f"],
            stroke: { curve: "straight", lineCap: "round", width: 3 },
            series: [{ name: "series1", data: [20, 10, 18, 12, 25, 10, 20] }],
            yaxis: { min: 0, max: 30 },
            tooltip: {
                theme: "dark",
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
        new ApexCharts(document.querySelector("#total-revenue-line-2-chart"), {
            chart: { type: "line", height: 60, sparkline: { enabled: !0 } },
            dataLabels: { enabled: !1 },
            colors: ["#dc2626"],
            stroke: { curve: "straight", lineCap: "round", width: 3 },
            series: [{ name: "series1", data: [20, 10, 25, 18, 18, 10, 12] }],
            yaxis: { min: 0, max: 30 },
            tooltip: {
                theme: "dark",
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
        new ApexCharts(document.querySelector("#student-states-chart"), {
            chart: { height: 250, type: "donut" },
            dataLabels: { enabled: !1 },
            plotOptions: { pie: { donut: { size: "65%" } } },
            labels: ["Total Signups", "Active Student"],
            series: [76.7, 30],
            legend: { show: !0, position: "bottom" },
            fill: { opacity: [1, 0.5] },
            colors: ["#1C582C", "#1C582C"],
        }).render(),
        new ApexCharts(document.querySelector("#activity-line-chart"), {
            chart: { type: "line", height: 300, toolbar: { show: !1 } },
            colors: ["#2ca87f", "#1C582C"],
            dataLabels: { enabled: !1 },
            legend: { show: !0, position: "top" },
            markers: {
                size: 1,
                colors: ["#fff", "#fff", "#fff"],
                strokeColors: ["#2ca87f", "#1C582C"],
                strokeWidth: 1,
                shape: "circle",
                hover: { size: 4 },
            },
            stroke: { width: 3, curve: "smooth" },
            grid: { strokeDashArray: 4 },
            series: [
                { name: "Free Course", data: [20, 90, 65, 85, 20, 80, 30] },
                { name: "Subscription", data: [70, 30, 40, 15, 60, 40, 95] },
            ],
            xaxis: {
                labels: { hideOverlappingLabels: !0 },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
        }).render(),
        new ApexCharts(document.querySelector("#visitors-bar-chart"), {
            chart: { type: "bar", height: 220, toolbar: { show: !1 } },
            colors: ["#2ca87f"],
            dataLabels: { enabled: !1 },
            grid: { strokeDashArray: 4 },
            yaxis: { tickAmount: 3 },
            states: {
                normal: { filter: { type: "lighten", value: 0.5 } },
                hover: { filter: { type: "lighten", value: 0 } },
            },
            plotOptions: { bar: { borderRadius: 2, columnWidth: "50%" } },
            labels: ["2018", "2019", "2020", "2021", "2022", "2023"],
            series: [{ data: [20, 15, 22, 25, 32, 50] }],
        }).render(),
        new ApexCharts(document.querySelector("#earning-courses-line-chart"), {
            chart: { type: "line", height: 230, toolbar: { show: !1 } },
            colors: ["#e58a00", "#1C582C"],
            dataLabels: { enabled: !1 },
            markers: {
                size: 1,
                colors: ["#fff", "#fff", "#fff"],
                strokeColors: ["#e58a00", "#1C582C"],
                strokeWidth: 1,
                shape: "circle",
                hover: { size: 4 },
            },
            stroke: { width: 3 },
            grid: { strokeDashArray: 4 },
            series: [
                { name: "Last Month", data: [200, 320, 275, 400, 300, 440] },
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
    }, 500),
        document.querySelector(".user-scroll") &&
            new SimpleBar(document.querySelector(".user-scroll")),
        document.querySelector(".feed-scroll") &&
            new SimpleBar(document.querySelector(".feed-scroll"));
    new Datepicker(document.querySelector("#pc-datepicker-6"), {
        buttonClass: "btn",
    });
    (peity.defaults.donut = {
        delimiter: null,
        fill: ["#ff9900", "#fff4dd", "#ffd592"],
        height: null,
        innerRadius: 11,
        radius: 16,
        width: null,
    }),
        document.querySelectorAll(".donut").forEach((e) => peity(e, "donut"));
});
