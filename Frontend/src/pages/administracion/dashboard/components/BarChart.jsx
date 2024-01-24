import React, { useEffect } from "react";
import Chart from "chart.js";

export default function EmployeeChart() {
  useEffect(() => {
    const data = {
      provinces: ["Chimborazo", "Pichincha", "Azuay"],
      cities: {
        Chimborazo: ["Riobamba", "Guano", "Chambo"],
        Pichincha: ["Quito", "Cayambe", "Sangolquí"],
        Azuay: ["Cuenca", "Gualaceo", "Azogues"],
      },
      employees: {
        Chimborazo: {
          Riobamba: 50,
          Guano: 30,
          Chambo: 20,
        },
        Pichincha: {
          Quito: 120,
          Cayambe: 80,
          Sangolquí: 60,
        },
        Azuay: {
          Cuenca: 90,
          Gualaceo: 40,
          Azogues: 30,
        },
      },
    };

    const provinceLabels = data.provinces;
    const cityLabels = data.cities[data.provinces[0]];
    const provinceData = provinceLabels.map((province) =>
      data.cities[province].map((city) => data.employees[province][city])
    );

    const config = {
      type: "bar",
      data: {
        labels: cityLabels,
        datasets: provinceLabels.map((province, index) => ({
          label: province,
          backgroundColor: getFixedColor(index),
          borderColor: getFixedColor(index),
          data: provinceData[index],
          fill: false,
          barThickness: 8,
        })),
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        title: {
          display: false,
          text: "Total de Empleados por Provincia y Ciudad",
        },
        tooltips: {
          mode: "index",
          intersect: false,
        },
        hover: {
          mode: "nearest",
          intersect: true,
        },
        legend: {
          display: true,
          position: "bottom",
        },
        scales: {
          xAxes: [
            {
              display: true,
              scaleLabel: {
                display: true,
                labelString: "Ciudad",
              },
              gridLines: {
                borderDash: [2],
                borderDashOffset: [2],
                color: "rgba(33, 37, 41, 0.3)",
                zeroLineColor: "rgba(33, 37, 41, 0.3)",
                zeroLineBorderDash: [2],
                zeroLineBorderDashOffset: [2],
              },
            },
          ],
          yAxes: [
            {
              display: true,
              scaleLabel: {
                display: true,
                labelString: "Total Empleados",
              },
              gridLines: {
                borderDash: [2],
                drawBorder: false,
                borderDashOffset: [2],
                color: "rgba(33, 37, 41, 0.2)",
                zeroLineColor: "rgba(33, 37, 41, 0.15)",
                zeroLineBorderDash: [2],
                zeroLineBorderDashOffset: [2],
              },
            },
          ],
        },
      },
    };

    const ctx = document.getElementById("employee-chart").getContext("2d");
    window.myBar = new Chart(ctx, config);
  }, []);

  const getFixedColor = (index) => {
    const colors = ["#FF5733", "#33FF57", "#5733FF"]; // You can add more fixed colors
    return colors[index % colors.length];
  };

  return (
    <div className="w-full xl:w-7/12 px-4">
      <div className="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
        <div className="rounded-t mb-0 px-4 py-3 bg-transparent">
          <div className="flex flex-wrap items-center">
            <div className="relative w-full max-w-full flex-grow flex-1">
              <h6 className="uppercase text-blueGray-400 mb-1 text-xs font-semibold">
                Desempeño
              </h6>
              <h2 className="text-blueGray-700 text-xl font-semibold">
                Total de empleados por provincia y ciudad
              </h2>
            </div>
          </div>
        </div>
        <div className="p-4 flex-auto">
          {/* Chart */}
          <div className="relative" style={{ height: "350px" }}>
            <canvas id="employee-chart"></canvas>
          </div>
        </div>
      </div>
    </div>
  );
}
