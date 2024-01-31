import React, { useEffect, useRef } from "react";
import Chart from "chart.js";

const TotalEmpleadosXEstadoCard = () => {
  const chartRef = useRef(null);

  useEffect(() => {
    // Datos para el gráfico de ejemplo
    const data = {
      labels: ["Activos", "Inactivos"],
      datasets: [
        {
          data: [250, 100],
          backgroundColor: ["#2ecc71", "#e74c3c"],
        },
      ],
    };

    // Configuración del gráfico
    const options = {
      responsive: true,
      maintainAspectRatio: false,
    };

    // Crear el gráfico
    const ctx = chartRef.current.getContext("2d");
    const myPieChart = new Chart(ctx, {
      type: "pie",
      data: data,
      options: options,
    });

    // Limpieza al desmontar el componente
    return () => {
      myPieChart.destroy();
    };
  }, []); // El array vacío asegura que el efecto se ejecute solo una vez al montar el componente

  return (
    <>
      <div className="w-full lg:w-6/12 mb-3 xl:w-4/12 px-4">
        <div className="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
          <div className="flex-auto p-4">
            <div className="flex flex-wrap">
              <div className="relative w-full pr-4 max-w-full flex-grow flex-1 text-center">
                <h5 className="text-blueGray-400 uppercase font-bold">
                  Total Empleados por Estado
                </h5>
                <span className="font-semibold text-5xl text-blueGray-700 text-sm">
                  350
                </span>
              </div>
              <div className="relative w-auto pl-4 flex-initial">
                {/* Contenedor del gráfico */}
                <canvas ref={chartRef}></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default TotalEmpleadosXEstadoCard;
