import React from "react";
import useTiposCapacitaciones from "../../../../hooks/useTiposCapacitaciones";
import TableTiposCapacitaciones from "./components/TableTiposCapacitaciones";
import FormNuevaTiposCapacitaciones from "./components/FormNuevaTiposCapacitaciones";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";
// import FormNuevoDepartamento from "../components/FormNuevaDireccion";

import NavegacionCapacitaciones from "../components/NavegacionCapacitaciones";
const  IndexTiposCapacitacionesAdministrador = () => {
  const { TiposCapacitaciones, setCargando } = useTiposCapacitaciones();
  const MySwal = withReactContent(Swal);

  const handleEliminarClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará el tipo de capacitación. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la lógica para eliminar la dirección
        MySwal.fire("Eliminado", "El tipo de capacitacion  ha sido eliminada.", "success");
      }
    });
  };

  const handleNuevaClick = () => {
    MySwal.fire({
      title: "Nuevo Tipo de capacitacion",
      html: <FormNuevaTiposCapacitaciones />,
      showCancelButton: true,
      showCloseButton: true,
      reverseButtons: true,
      cancelButtonColor: "#d33",
      confirmButtonColor: "#3085d6",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Crear",
      width: "50%",
    }).then((result) => {
      if (result.isConfirmed) {
        MySwal.fire("Success", "Tipo de capacitacion creada correctamente", "success");
      }
    });
  };

  return (
    <>
     <NavegacionCapacitaciones />
      <div className="uppercase  bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start my-3">
        <h1 className="ms-0 me-10">
            Total de tipos de capacitaciones:{" "}
            <span className="text-blue-700">{TiposCapacitaciones.length}</span>{" "}
          </h1>
        </div>
        <div className="flex justify-end">
          <button
            className="bg-red-700 text-white mx-10 py-2 px-5 rounded-lg"
            onClick={handleEliminarClick}
          >
            Eliminar
          </button>

          <button
            className="bg-blue-700 text-white py-2 px-5 rounded-lg"
            onClick={handleNuevaClick}
          >
            Nueva
          </button>
        </div>
        <div className="flex justify-start">
          {/* Puedes agregar controles adicionales o filtros relacionados con las direcciones aquí */}
        </div>
      </div>

      <div className="h-full">
        <TableTiposCapacitaciones TiposCapacitaciones={TiposCapacitaciones} />
      </div>
    </>
  );
};

export default IndexTiposCapacitacionesAdministrador;
