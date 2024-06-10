import 'apexcharts/dist/apexcharts.css'
import 'apexcharts'
import './hs-apexcharts-helpers.js'
// import './lodash.js'

import ApexCharts from "apexcharts";

const chart01 = (name, labels, data) => {
    const maxValue = Math.max(...data);
    const chartOneOptions = {
        series: [
            {
                name: name,
                data: data,
            },
        ],
        legend: {
            show: false,
            position: "top",
            horizontalAlign: "left",
        },
        colors: ["#3C50E0", "#80CAEE"],
        chart: {
            fontFamily: "Satoshi, sans-serif",
            height: 335,
            type: "area",
            dropShadow: {
                enabled: true,
                color: "#623CEA14",
                top: 10,
                blur: 4,
                left: 0,
                opacity: 0.1,
            },

            toolbar: {
                show: false,
            },
        },
        responsive: [
            {
                breakpoint: 1024,
                options: {
                    chart: {
                        height: 300,
                    },
                },
            },
            {
                breakpoint: 1366,
                options: {
                    chart: {
                        height: 350,
                    },
                },
            },
        ],
        stroke: {
            width: [2, 2],
            curve: "straight",
        },

        markers: {
            size: 0,
        },
        labels: {
            show: false,
            position: "top",
        },
        grid: {
            xaxis: {
                lines: {
                    show: true,
                },
            },
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
        dataLabels: {
            enabled: false,
        },
        markers: {
            size: 4,
            colors: "#fff",
            strokeColors: ["#3056D3", "#80CAEE"],
            strokeWidth: 3,
            strokeOpacity: 0.9,
            strokeDashArray: 0,
            fillOpacity: 1,
            discrete: [],
            hover: {
                size: undefined,
                sizeOffset: 5,
            },
        },
        xaxis: {
            type: "category",
            categories: labels,
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            title: {
                style: {
                    fontSize: "0px",
                },
            },
            min: 0,
            max: maxValue,
        },
    };

    const chartSelector = document.querySelectorAll("#chartOne");

    if (chartSelector.length) {
        const chartOne = new ApexCharts(
            document.querySelector("#chartOne"),
            chartOneOptions
        );
        chartOne.render();
    }
};

const chart02 = () => {
    const chartTwoOptions = {
        series: [
            {
                name: "Sales",
                data: [44, 55, 41, 67, 22, 43, 65],
            },
            {
                name: "Revenue",
                data: [13, 23, 20, 8, 13, 27, 15],
            },
        ],
        colors: ["#3056D3", "#80CAEE"],
        chart: {
            type: "bar",
            height: 335,
            stacked: true,
            toolbar: {
                show: false,
            },
            zoom: {
                enabled: false,
            },
        },

        responsive: [
            {
                breakpoint: 1536,
                options: {
                    plotOptions: {
                        bar: {
                            borderRadius: 0,
                            columnWidth: "25%",
                        },
                    },
                },
            },
        ],
        plotOptions: {
            bar: {
                horizontal: false,
                borderRadius: 0,
                columnWidth: "25%",
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "last",
            },
        },
        dataLabels: {
            enabled: false,
        },

        xaxis: {
            categories: ["M", "T", "W", "T", "F", "S", "S"],
        },
        legend: {
            position: "top",
            horizontalAlign: "left",
            fontFamily: "Satoshi",
            fontWeight: 500,
            fontSize: "14px",

            markers: {
                radius: 99,
            },
        },
        fill: {
            opacity: 1,
        },
    };

    const chartSelector = document.querySelectorAll("#chartTwo");

    if (chartSelector.length) {
        const chartTwo = new ApexCharts(
            document.querySelector("#chartTwo"),
            chartTwoOptions
        );
        chartTwo.render();
    }
};

const chart04 = () => {
    const chartFourOptions = {
        series: [
            {
                data: [
                    168, 385, 201, 298, 187, 195, 291, 110, 215, 390, 280, 112, 123, 212,
                    270, 190, 310, 115, 90, 380, 112, 223, 292, 170, 290, 110, 115, 290,
                    380, 312,
                ],
            },
        ],
        colors: ["#3C50E0"],
        chart: {
            fontFamily: "Satoshi, sans-serif",
            type: "bar",
            height: 350,
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "55%",
                endingShape: "rounded",
                borderRadius: 2,
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 4,
            colors: ["transparent"],
        },
        xaxis: {
            categories: [
                "1",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7",
                "8",
                "9",
                "10",
                "11",
                "12",
                "13",
                "14",
                "15",
                "16",
                "17",
                "18",
                "19",
                "20",
                "21",
                "22",
                "23",
                "24",
                "25",
                "26",
                "27",
                "28",
                "29",
                "30",
            ],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: "left",
            fontFamily: "Satoshi",

            markers: {
                radius: 99,
            },
        },
        yaxis: {
            title: false,
        },
        grid: {
            yaxis: {
                lines: {
                    show: false,
                },
            },
        },
        fill: {
            opacity: 1,
        },

        tooltip: {
            x: {
                show: false,
            },
            y: {
                formatter: function (val) {
                    return val;
                },
            },
        },
    };

    const chartSelector = document.querySelectorAll("#chartFour");

    if (chartSelector.length) {
        const chartFour = new ApexCharts(
            document.querySelector("#chartFour"),
            chartFourOptions
        );
        chartFour.render();
    }
};

const chart03 = () => {
    const chartThreeOptions = {
        series: [],
        chart: {
            type: "donut",
            width: 380,
        },
        colors: ["#3C50E0", "#6577F3", "#8FD0EF", "#0FADCF"],
        labels: ["Desktop", "Tablet", "Mobile", "Unknown"],
        legend: {
            show: false,
            position: "bottom",
        },

        plotOptions: {
            pie: {
                donut: {
                    size: "65%",
                    background: "transparent",
                },
            },
        },

        dataLabels: {
            enabled: false,
        },
        responsive: [
            {
                breakpoint: 640,
                options: {
                    chart: {
                        width: 200,
                    },
                },
            },
        ],
    };

    const chartSelector = document.querySelectorAll("#chartThree");

    if (chartSelector.length) {
        const chartThree = new ApexCharts(
            document.querySelector("#chartThree"),
            chartThreeOptions
        );
        chartThree.render();
    }
};
document.addEventListener("DOMContentLoaded", function () {
    let typeChart = 0;
    // console.log(apiUrl)
    function fetchData(type)
    {
        console.log(type)
        axios.get(apiUrl, {
            params: {
                type: type
            }
        })
            .then(response => {
                const data = response.data
                const labels = data.labels
                const values = data.total
                const name = data.name
                document.getElementById("chartOne").innerHTML = ''
                chart01(name, labels, values)
            })
            .catch(error => {
                console.log(error)
            })
    }

    const monthBtn = document.getElementById('month_btn_chart');
    const yearBtn = document.getElementById('year_btn_chart');

    monthBtn.classList.add('shadow-card');
    fetchData(typeChart);

    monthBtn.addEventListener('click', function() {
        if (typeChart !== 0) {
            typeChart = 0;
            fetchData(typeChart);
            monthBtn.classList.add('shadow-card');
            if(yearBtn.classList.contains('shadow-card'))
                yearBtn.classList.remove('shadow-card');
        }
    });

    yearBtn.addEventListener('click', function() {
        if (typeChart !== 1) {
            typeChart = 1;
            fetchData(typeChart);
            yearBtn.classList.add('shadow-card');
            if(monthBtn.classList.contains('shadow-card'))
                monthBtn.classList.remove('shadow-card');
        }
    });
});
