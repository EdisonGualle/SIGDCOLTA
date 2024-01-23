// eslint-disable-next-line no-unused-vars
import React from "react";
import useCapacitaciones from "../../../hooks/useCapacitaciones";
import TableCapacitaciones from "./components/TableCapacitaciones";
import NavegacionCapacitaciones from "./components/NavegacionCapacitaciones";

const IndexCapacitacionesAdministrador = () => {
  const { capacitaciones } = useCapacitaciones();
  const empleadosActivos = capacitaciones.filter(
    (posicion) => posicion.nombreEstado === "activo"
  );
  const empleadosInactivos = capacitaciones.filter(
    (posicion) => posicion.nombreEstado === "inactivo"
  );
  // Puedes realizar cualquier lógica adicional con la información de capacitaciones aquí

  return (
    <>
      <NavegacionCapacitaciones />
      {/* Div con estadísticas de capacitaciones */}
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start mb-3 mt-3 ">
          <h1 className="mx-10">
            Total de capacitaciones:{" "}
            <span className="text-blue-700">{capacitaciones.length}</span>{" "}
          </h1>
          <h1 className="">
            Empleados Activos:{" "}
            <span className="text-green-700">{empleadosActivos.length}</span>
          </h1>
          <h1 className="mx-10">
            Empleados Inactivos:{" "}
            <span className="text-red-700">{empleadosInactivos.length}</span>
          </h1>        </div>
      </div>

      <div className="h-full">
        <TableCapacitaciones capacitaciones={capacitaciones} />
      </div>
    </>
  );
};

export default IndexCapacitacionesAdministrador;
