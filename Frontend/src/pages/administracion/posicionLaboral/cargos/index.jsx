import React from "react";
import useCargos from "../../../../hooks/useCargos"; // Actualiza la importación según la ubicación de tu hook de cargos
import TableCargos from "./components/TableCargos"; // Actualiza la importación según la ubicación de tu componente de tabla de cargos
import FormNuevoCargo from "./components/FormNuevoCargo"; // Actualiza la importación según la ubicación de tu formulario para nuevo cargo
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";

import NavegacionPosicionesLaborales from "../components/NavegacionPosicionesLaborales";
import useUnidades from "../../../../hooks/useUnidades";
const IndexCargosAdministrador = () => {
  const { cargos, setCargando } = useCargos();
  const { unidades } = useUnidades();
  const MySwal = withReactContent(Swal);

  const handleEliminarClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará el cargo. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la lógica para eliminar el cargo
        MySwal.fire("Eliminado", "El cargo ha sido eliminado.", "success");
      }
    });
  };

  const handleNuevaClick = () => {
    MySwal.fire({
      title: "Nuevo Cargo",
      html: <FormNuevoCargo unidades={unidades} />,
      showCancelButton: true,
      showConfirmButton: false,
      cancelButtonColor: "#3085d6",
      cancelButtonText: "Cerrar",
      cancelButtonColor: "#3085d6",
      cancelButtonText: "Cerrar",
      width: "50%",
    });
  };

  return (
    <>
      <NavegacionPosicionesLaborales />
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start mb-3 mt-3">
          <h1 className="mx-10">
            Total de cargos: <span className="text-blue-700">{cargos.length}</span>{" "}
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
            Nuevo
          </button>
        </div>
        <div className="flex justify-start">
          {/* Puedes agregar controles adicionales o filtros relacionados con los cargos aquí */}
        </div>
      </div>
      <div className="h-full">
        <TableCargos cargos={cargos} />
      </div>
    </>
  );
};

export default IndexCargosAdministrador;
