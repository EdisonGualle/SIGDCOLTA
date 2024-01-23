import React from "react";
import usePosicionesLaborales from "../../../hooks/usePosicionesLaborales";
import TablePosicionesLaborales from "./components/TablePosicionesLaborales";
import { Link, useNavigate } from "react-router-dom";

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
      {/* Navbar */}
      <nav className="pb-3 text-white rounded-lg">
        <ul className="flex">
          {/* Posicion Laboral */}
          <li className="">
            <Link
              to="/administracion/posiciones-laborales"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2 rounded-tl-lg rounded-bl-lg  transition"
            >
              Posiciones Laborales
            </Link>
          </li>
          {/* Departamentos */}
          <li className="">
            <Link
              to="/administracion/departamentos"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2   transition"
            >
              Departamentos
            </Link>
          </li>
          {/* Unidades */}
          <li className="">
            <Link
              to="/administracion/unidades"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2  transition"
            >
              Unidades
            </Link>
          </li>
          {/* Cargos */}
          <li className="mr-6">
            <Link
              to="/administracion/cargos"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2 rounded-tr-lg rounded-br-lg  transition"
            >
              Cargos
            </Link>
          </li>
        </ul>
      </nav>

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
