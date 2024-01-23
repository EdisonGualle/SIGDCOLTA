import React from "react";
import useDirecciones from "../../../../hooks/useDirecciones";
import TableDirecciones from "./components/TableDirecciones";
import FormNuevaDireccion from "./components/FormNuevaDireccion";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";
// import FormNuevoDepartamento from "../components/FormNuevaDireccion";

import NavegacionPosicionesLaborales from "../components/NavegacionPosicionesLaborales";
const  IndexDireccionesAdministrador = () => {
  const { direcciones, setCargando } = useDirecciones();
  const MySwal = withReactContent(Swal);

  const handleEliminarClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará la dirección. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la lógica para eliminar la dirección
        MySwal.fire("Eliminado", "La dirección ha sido eliminada.", "success");
      }
    });
  };

  const handleNuevaClick = () => {
    MySwal.fire({
      title: "Nueva Dirección",
      html: <FormNuevaDireccion />,
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
        MySwal.fire("Success", "Dirección creada correctamente", "success");
      }
    });
  };

  return (
    <>
     <NavegacionPosicionesLaborales />
      <div className="uppercase  bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start mb-3 mt-3">
        <h1 className="mx-10">
            Total de direcciones:{" "}
            <span className="text-blue-700">{direcciones.length}</span>{" "}
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
        <TableDirecciones direcciones={direcciones} />
      </div>
    </>
  );
};

export default IndexDireccionesAdministrador;
