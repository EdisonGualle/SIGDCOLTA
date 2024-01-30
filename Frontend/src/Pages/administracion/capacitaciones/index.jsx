// Ruta: tu-proyecto/src/capacitaciones/index.jsx
import React from "react";
import useCapacitaciones from "../../../hooks/useCapacitaciones";
import TableCapacitaciones from "./components/TableCapacitaciones";
import FormNuevaCapacitacion from "./components/FormNuevaCapacitacion";
import NavegacionCapacitaciones from "./components/NavegacionCapacitaciones";
import withReactContent from "sweetalert2-react-content";

import Swal from "sweetalert2";

const IndexCapacitacionesAdministrador = () => {
  const { capacitaciones} = useCapacitaciones();
  console.log("Datos traídos del provider:", capacitaciones);
  const MySwal = withReactContent(Swal);
  // Lógica para filtrar capacitaciones según sea necesario
  // Puedes adaptar esta lógica según tus necesidades específicas
  const capacitacionesActivas = capacitaciones.filter(
    (capacitacion) => capacitacion.estado === "activo"
  );

  const capacitacionesInactivas = capacitaciones.filter(
    (capacitacion) => capacitacion.estado === "inactivo"
  );

  const handleEliminarCapacitacionClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará la capacitación seleccionada. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Lógica para eliminar el contrato
        MySwal.fire("Eliminado", "La capacitación ha sido eliminado.", "success");
      }
    });
  };

  const handleNuevaCapacitacionClick = () => {
    MySwal.fire({
      title: "Nuevo Contrato",
      html: <FormNuevaCapacitacion />, // Renderiza el formulario 
      showCancelButton: false,
      showConfirmButton: false,
      cancelButtonColor: "#3085d6",
      width: "50%",
    });
  };
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

        <div className="flex justify-end">
          <button
            className="bg-red-700 text-white mx-10 py-2 px-5 rounded-lg"
            onClick={handleEliminarCapacitacionClick}
          >
            Eliminar
          </button>
          <button
            className="bg-blue-700 text-white py-2 px-5 rounded-lg"
            onClick={handleNuevaCapacitacionClick}
          >
            Nuevo
          </button>

        </div>

      </div>

      <div className="h-full">
        <TableCapacitaciones capacitaciones={capacitaciones} />
      </div>
    </>
  );
};

export default IndexCapacitacionesAdministrador;
