import React from "react";
import usePosicionesLaborales from "../../../hooks/usePosicionesLaborales";
import TablePosicionesLaborales from "./components/TablePosicionesLaborales";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";

const IndexPosicionesLaboralesAdministrador = () => {
  const { posicionesLaborales, setCargando } = usePosicionesLaborales();
  console.log("Posiciones Laborales component - posicionesLaborales:", posicionesLaborales);

  const MySwal = withReactContent(Swal);

  const handleEliminarClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará la posición laboral. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la lógica para eliminar la posición laboral
        MySwal.fire("Eliminado", "La posición laboral ha sido eliminada.", "success");
      }
    });
  };

  const handleNuevaClick = () => {
    MySwal.fire({
      title: "Nueva Posición Laboral",
      html: <FormNuevaPosicionLaboral />,
      showCancelButton: true,
      showConfirmButton: false,
      cancelButtonColor: "#3085d6",
      cancelButtonText: "Cerrar",
      width: "50%",
    });
  };

  return (
    <>
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start mb-3">
          {/* Puedes mostrar estadísticas u otros datos relacionados con las posiciones laborales aquí */}
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
          {/* Puedes agregar controles adicionales o filtros relacionados con las posiciones laborales aquí */}
        </div>
      </div>

      <div className="h-full">
        <TablePosicionesLaborales posicionesLaborales={posicionesLaborales} />
      </div>
    </>
  );
};

export default IndexPosicionesLaboralesAdministrador;
