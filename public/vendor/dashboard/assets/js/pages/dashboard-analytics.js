"use strict";
function floatchart() {
    new ApexCharts(document.querySelector("#new-orders-graph"), {
        chart: { type: "bar", height: 80, sparkline: { enabled: !0 } },
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
        new ApexCharts(document.querySelector("#new-users-graph"), {
            chart: { type: "area", height: 80, sparkline: { enabled: !0 } },
            colors: ["#2CA87F"],
            stroke: { curve: "straight", width: 2 },
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
            series: [{ data: [1, 1, 60, 1, 1, 50, 1, 1, 40, 1, 1, 25, 0] }],
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
        new ApexCharts(document.querySelector("#visitors-graph"), {
            series: [
                {
                    data: [
                        { x: "", y: [1, 6] },
                        { x: "", y: [3, 7] },
                        { x: "", y: [4, 8] },
                        { x: "", y: [5, 9] },
                        { x: "", y: [4, 8] },
                        { x: "", y: [4, 7] },
                        { x: "", y: [2, 5] },
                    ],
                },
            ],
            chart: {
                type: "rangeBar",
                height: 80,
                sparkline: { enabled: !0 },
                toolbar: { show: !1 },
            },
            colors: ["#E58A00"],
            plotOptions: {
                bar: { columnWidth: "30%", borderRadius: 5, horizontal: !1 },
            },
            yaxis: { tickAmount: 2, min: 0, max: 10 },
            grid: {
                show: !1,
                padding: { top: 0, right: 0, bottom: 0, left: 0 },
            },
            xaxis: {
                labels: { show: !1 },
                axisBorder: { show: !1 },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
            dataLabels: { enabled: !1 },
        }).render();
    var e = {
        chart: { height: 250, type: "bar", toolbar: { show: !1 } },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "55%",
                borderRadius: 4,
                borderRadiusApplication: "end",
            },
        },
        legend: { show: !0, position: "top", horizontalAlign: "left" },
        dataLabels: { enabled: !1 },
        colors: ["#1C582C", "#1C582C"],
        stroke: { show: !0, width: 3, colors: ["transparent"] },
        fill: { colors: ["#1C582C", "#1C582C"], opacity: [1, 0.5] },
        grid: { strokeDashArray: 4 },
        series: [
            { name: "Net Profit", data: [76, 85, 101, 98, 87, 105, 91] },
            { name: "Revenue", data: [44, 55, 57, 56, 61, 58, 63] },
        ],
        xaxis: {
            categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        },
        tooltip: {
            y: {
                formatter: function (e) {
                    return "$ " + e + " thousands";
                },
            },
        },
    };
    new ApexCharts(document.querySelector("#overview-chart-1"), e).render(),
        new ApexCharts(document.querySelector("#overview-chart-3"), e).render(),
        (e = {
            chart: { height: 250, type: "bar", toolbar: { show: !1 } },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "55%",
                    borderRadius: 4,
                    borderRadiusApplication: "end",
                },
            },
            legend: { show: !0, position: "top", horizontalAlign: "left" },
            dataLabels: { enabled: !1 },
            colors: ["#1C582C", "#1C582C"],
            stroke: { show: !0, width: 3, colors: ["transparent"] },
            fill: { colors: ["#1C582C", "#1C582C"], opacity: [1, 0.5] },
            grid: { strokeDashArray: 4 },
            series: [
                { name: "Net Profit", data: [98, 87, 105, 91, 76, 85, 101] },
                { name: "Revenue", data: [56, 61, 58, 63, 44, 55, 57] },
            ],
            xaxis: {
                categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
            },
            tooltip: {
                y: {
                    formatter: function (e) {
                        return "$ " + e + " thousands";
                    },
                },
            },
        }),
        new ApexCharts(document.querySelector("#overview-chart-2"), e).render(),
        new ApexCharts(document.querySelector("#overview-chart-4"), e).render(),
        new ApexCharts(document.querySelector("#income-graph"), {
            chart: { type: "bar", height: 80, sparkline: { enabled: !0 } },
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
        new ApexCharts(document.querySelector("#languages-graph"), {
            chart: { type: "area", height: 130, sparkline: { enabled: !0 } },
            colors: ["#1890ff"],
            plotOptions: { bar: { columnWidth: "80%" } },
            series: [
                {
                    data: [
                        100, 140, 100, 250, 115, 125, 90, 100, 140, 100, 230,
                        115, 215, 90, 190, 100, 120, 180,
                    ],
                },
            ],
            xaxis: { crosshairs: { width: 1 } },
            stroke: { width: 1.5 },
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
        new ApexCharts(document.querySelector("#overview-product-graph"), {
            chart: { height: 350, type: "pie" },
            labels: [
                "Components",
                "Widgets",
                "Pages",
                "Forms",
                "Other",
                "Apps",
            ],
            series: [40, 20, 10, 15, 5, 10],
            colors: [
                "#1C582C",
                "#1C582C",
                "#212529",
                "#212529",
                "#212529",
                "#212529",
            ],
            fill: { opacity: [1, 0.6, 0.4, 0.6, 0.8, 1] },
            legend: { show: !1 },
            dataLabels: { enabled: !0, dropShadow: { enabled: !1 } },
            responsive: [
                {
                    breakpoint: 575,
                    options: {
                        chart: { height: 250 },
                        dataLabels: { enabled: !1 },
                    },
                },
            ],
        }).render(),
        (e = {
            series: [30],
            chart: { height: 150, type: "radialBar" },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: "60%",
                        background: "transparent",
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: "front",
                    },
                    track: { background: "#1C582C50", strokeWidth: "50%" },
                    dataLabels: {
                        show: !0,
                        name: { show: !1 },
                        value: {
                            formatter: function (e) {
                                return parseInt(e);
                            },
                            offsetY: 7,
                            color: "#1C582C",
                            fontSize: "20px",
                            fontWeight: "700",
                            show: !0,
                        },
                    },
                },
            },
            colors: ["#1C582C"],
            fill: { type: "solid" },
            stroke: { lineCap: "round" },
        }),
        new ApexCharts(
            document.querySelector("#total-earning-graph-1"),
            e
        ).render(),
        (e = {
            series: [30],
            chart: { height: 150, type: "radialBar" },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: "60%",
                        background: "transparent",
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: "front",
                    },
                    track: { background: "#DC262650", strokeWidth: "50%" },
                    dataLabels: {
                        show: !0,
                        name: { show: !1 },
                        value: {
                            formatter: function (e) {
                                return parseInt(e);
                            },
                            offsetY: 7,
                            color: "#DC2626",
                            fontSize: "20px",
                            fontWeight: "700",
                            show: !0,
                        },
                    },
                },
            },
            colors: ["#DC2626"],
            fill: { type: "solid" },
            stroke: { lineCap: "round" },
        }),
        new ApexCharts(
            document.querySelector("#total-earning-graph-2"),
            e
        ).render();
}
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        floatchart();
    }, 500);
});
