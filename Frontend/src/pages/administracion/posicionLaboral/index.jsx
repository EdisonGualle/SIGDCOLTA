import React from "react";
import usePosicionesLaborales from "../../../hooks/usePosicionesLaborales";
import TablePosicionesLaborales from "./components/TablePosicionesLaborales";
import NavegacionPosicionesLaborales from "./components/NavegacionPosicionesLaborales";

const IndexPosicionesLaboralesAdministrador = () => {
  const { posicionesLaborales, setCargando } = usePosicionesLaborales();
  const empleadosActivos = posicionesLaborales.filter(
    (posicion) => posicion.nombreEstado === "activo"
  );
  const empleadosInactivos = posicionesLaborales.filter(
    (posicion) => posicion.nombreEstado === "inactivo"
  );

  return (
    <>
      <NavegacionPosicionesLaborales />
      {/* Div con estadísticas de empleados */}
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start mb-3 mt-3 ">
          <h1 className="mx-10">
            Total de empleados:{" "}
            <span className="text-blue-700">{posicionesLaborales.length}</span>{" "}
          </h1>
          <h1 className="">
            Empleados Activos:{" "}
            <span className="text-green-700">{empleadosActivos.length}</span>
          </h1>
          <h1 className="mx-10">
            Empleados Inactivos:{" "}
            <span className="text-red-700">{empleadosInactivos.length}</span>
          </h1>
        </div>
      </div>

      <div className="h-full">
        <TablePosicionesLaborales posicionesLaborales={posicionesLaborales} />
      </div>
    </>
  );
};

export default IndexPosicionesLaboralesAdministrador;
