"use strict";
new ApexCharts(document.querySelector("#support-chart"), {
    chart: { type: "area", height: 100, sparkline: { enabled: !0 } },
    colors: ["#3ebfea"],
    stroke: { curve: "smooth", width: 2 },
    series: [{ name: "series1", data: [0, 20, 10, 45, 30, 55, 20, 30, 0] }],
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
    new ApexCharts(document.querySelector("#support-chart1"), {
        chart: { type: "area", height: 100, sparkline: { enabled: !0 } },
        colors: ["#1C582C"],
        stroke: { curve: "smooth", width: 2 },
        series: [{ name: "series1", data: [0, 20, 10, 45, 30, 55, 20, 30, 0] }],
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
    new ApexCharts(document.querySelector("#support-chart2"), {
        chart: { type: "area", height: 100, sparkline: { enabled: !0 } },
        colors: ["#2ca87f"],
        stroke: { curve: "smooth", width: 2 },
        series: [{ name: "series1", data: [0, 20, 10, 45, 30, 55, 20, 30, 0] }],
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
    new ApexCharts(document.querySelector("#satisfaction-chart"), {
        chart: { height: 260, type: "pie" },
        series: [66, 50, 40, 30],
        labels: ["Very Poor", "Satisfied", "Very Satisfied", "Poor"],
        legend: { show: !0, offsetY: 50 },
        theme: { monochrome: { enabled: !0, color: "#1C582C" } },
        responsive: [
            {
                breakpoint: 768,
                options: {
                    chart: { height: 320 },
                    legend: { position: "bottom", offsetY: 0 },
                },
            },
        ],
    }).render(),
    new SimpleBar(document.querySelector(".latest-scroll"));
