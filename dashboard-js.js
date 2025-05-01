
// --- Grafik Real Time untuk Suhu dan Kelembapan ---

(function($) {
    "use strict";

    var suhuData = [], kelembapanData = [], totalPoints = 500;

    async function getLogData() {
        try {
            const response = await fetch('get_logs_grafik.php'); // <-- UDAH DIGANTI DISINI
            const jsonData = await response.json();

            suhuData = [];
            kelembapanData = [];

            jsonData.logs.forEach((item, index) => {
                if (index < totalPoints) {
                    let suhu = parseFloat(item.suhu) || 0;
                    let kelembapan = parseFloat(item.kelembapan) || 0;

                    suhuData.push([index, suhu]);
                    kelembapanData.push([index, kelembapan]);
                }
            });

            while (suhuData.length < totalPoints) {
                suhuData.push([suhuData.length, 0]);
            }
            while (kelembapanData.length < totalPoints) {
                kelembapanData.push([kelembapanData.length, 0]);
            }

        } catch (error) {
            console.error('Error fetching log data for graphs:', error);
        }
    }

    var updateInterval = 3000; // 3 detik update

    var suhuPlot = $.plot("#cpu-load", [[]], {
        series: { shadowSize: 0 },
        yaxis: { min: 0, max: 50 },
        xaxis: { show: false },
        colors: ["#007BFF"],
        grid: {
            color: "transparent",
            hoverable: true,
            borderWidth: 0,
            backgroundColor: 'transparent'
        },
        tooltip: true,
        tooltipOpts: {
            content: "Suhu: %y°C",
            defaultTheme: false
        }
    });

    var kelembapanPlot = $.plot("#humidity-load", [[]], {
        series: { shadowSize: 0 },
        yaxis: { min: 0, max: 100 },
        xaxis: { show: false },
        colors: ["#00C851"],
        grid: {
            color: "transparent",
            hoverable: true,
            borderWidth: 0,
            backgroundColor: 'transparent'
        },
        tooltip: true,
        tooltipOpts: {
            content: "Kelembapan: %y%",
            defaultTheme: false
        }
    });

    async function updateGraphs() {
        await getLogData();
        
        suhuPlot.setData([suhuData]);
        suhuPlot.draw();

        kelembapanPlot.setData([kelembapanData]);
        kelembapanPlot.draw();

        setTimeout(updateGraphs, updateInterval);
    }

    updateGraphs();

})(jQuery);
