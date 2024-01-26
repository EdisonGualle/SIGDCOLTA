import React from "react";
import useDirecciones from "../hooks/useDirecciones";
import TableDirecciones from "../components/TableDirecciones";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";
import FormNuevoDepartamento from "../components/FormNuevaDireccion";

const Direcciones = () => {
  const { direcciones, setCargando } = useDirecciones();
  console.log("Direcciones component - direcciones:", direcciones);
 // Agrega este console.log para ver el estado de las direcciones
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
      showConfirmButton: false,
      cancelButtonColor: "#3085d6",
      cancelButtonText: "Cerrar",
      width: "50%",
    });
  };

  return (
    <>
      <div className="uppercase  bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start mb-3">
          {/* Puedes mostrar estadísticas u otros datos relacionados con las direcciones aquí */}
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

export default Direcciones;
