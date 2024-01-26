// Ruta: tu-proyecto/src/capacitaciones/index.jsx
import React from "react";
import useCapacitaciones from "../../../hooks/useCapacitaciones";
import TableCapacitaciones from "./components/TableCapacitaciones";
import NavegacionCapacitaciones from "./components/NavegacionCapacitaciones";

const IndexCapacitacionesAdministrador = () => {
  const { capacitaciones, cargando } = useCapacitaciones();

  // Lógica para filtrar capacitaciones según sea necesario
  // Puedes adaptar esta lógica según tus necesidades específicas
  const capacitacionesActivas = capacitaciones.filter(
    (capacitacion) => capacitacion.estado === "activo"
  );
  
  const capacitacionesInactivas = capacitaciones.filter(
    (capacitacion) => capacitacion.estado === "inactivo"
  );

  return (
    <>
      <NavegacionCapacitaciones />
      {/* Div con estadísticas de empleados */}
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start my-3 ">
          <h1 className="ms-0 me-10">
            Total de capacitaciones:{" "}
            <span className="text-blue-700">{capacitaciones.length}</span>{" "}
          </h1>
          <h1 className="">
            Capacitaciones Activas:{" "}
            <span className="text-green-700">{capacitacionesActivas.length}</span>
          </h1>
          <h1 className="mx-10">
            Capacitaciones Inactivas:{" "}
            <span className="text-red-700">{capacitacionesInactivas.length}</span>
          </h1>
        </div>
      </div>

      <div className="h-full">
        <TableCapacitaciones capacitaciones={capacitaciones} />
      </div>
    </>
  );
};

export default IndexCapacitacionesAdministrador;
