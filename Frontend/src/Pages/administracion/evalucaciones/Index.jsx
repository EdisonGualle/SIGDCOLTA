import React, { useState } from "react";
import TableEvaluaciones from "./components/TableEvaluaciones";
import useEvaluaciones from "../../../hooks/useEvaluaciones";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";
import NavegacionEvaluaciones from "./components/NavegacionEvaluaciones";


const IndexEvaluacionesAdministrador = () => {
  const { evaluaciones, setCargado} = useEvaluaciones();
  const evaluacionesAprobadas = evaluaciones.filter(
    (posicion) => posicion.estadoEvaluacion === "Aprobada"
  );
  
  const EvaluacionesRechazadas = evaluaciones.filter(
    (posicion) => posicion.estadoEvaluacion === "Rechazada"
  );
  // const [modalOpen, setModalOpen] = useState(false);
  const MySwal = withReactContent(Swal);

  const handleNuevoClick = () => {
    setModalOpen(true);
  };

  const handleCloseModal = () => {
    setModalOpen(false);
  };
  const handleEliminarClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará el Empleado. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la lógica para eliminar la unidad
        MySwal.fire("Eliminada", "Empleado Eliminado.", "success");
      }
    });
  };

 

  return (
    <>
      <NavegacionEvaluaciones />
      {/* Div con estadísticas de empleados */}
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start my-3 ">
          <h1 className="ms-0 me-10">
            Total de Evaluaciones{" "}
            <span className="text-blue-700">{evaluaciones.length}</span>{" "}
          </h1>
          <h1 className="">
            Evaluciones Aprobadas:{" "}
            <span className="text-green-700">{evaluacionesAprobadas.length}</span>
          </h1>
          <h1 className="mx-10">
            Evaluaciones Rechadazas:{" "}
            <span className="text-red-700">{EvaluacionesRechazadas.length}</span>
          </h1>

        </div>
      </div>

      <div className="h-full">
        <TableEvaluaciones evaluaciones={evaluaciones} />
      </div>
    </>
  );
};


export default IndexEvaluacionesAdministrador;
