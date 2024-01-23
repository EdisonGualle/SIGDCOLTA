import React from "react";
import useUnidades from "../../../../hooks/useUnidades"; // Actualiza la importación según la ubicación de tu hook de unidades
import TableUnidades from "./components/TableUnidades"; // Actualiza la importación según la ubicación de tu componente de tabla de unidades
import FormNuevaUnidad from "./components/FormNuevaUnidad"; // Actualiza la importación según la ubicación de tu formulario para nueva unidad
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";

import NavegacionPosicionesLaborales from "../components/NavegacionPosicionesLaborales";
import useDirecciones from "../../../../hooks/useDirecciones";

const IndexUnidadesAdministrador = () => {
  const { unidades, setCargando } = useUnidades();
  const { direcciones } = useDirecciones();
  const MySwal = withReactContent(Swal);

  const handleEliminarClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará la unidad. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la lógica para eliminar la unidad
        MySwal.fire("Eliminada", "La unidad ha sido eliminada.", "success");
      }
    });
  };
  const handleNuevaClick = () => {
    MySwal.fire({
      title: "Nueva Unidad",
      html: <FormNuevaUnidad direcciones={direcciones} />, // Actualiza la instancia del formulario según tus necesidades
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
        MySwal.fire("Success", "Unidad creada correctamente", "success");
      }
    });
  };

  return (
    <>
      <NavegacionPosicionesLaborales />
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start mb-3 mt-3">
          <h1 className="mx-10">
            Total de unidades:{" "}
            <span className="text-blue-700">{unidades.length}</span>{" "}
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
          {/* Puedes agregar controles adicionales o filtros relacionados con las unidades aquí */}
        </div>
      </div>
      <div className="h-full">
        <TableUnidades unidades={unidades} />
      </div>
    </>
  );
};

export default IndexUnidadesAdministrador;
