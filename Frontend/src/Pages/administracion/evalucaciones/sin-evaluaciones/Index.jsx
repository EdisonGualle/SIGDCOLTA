import React, { useState } from 'react';

import TableSinEvaluaciones from "./components/TableSinEvaluaciones";
import useSinEvaluaciones from "../../../../hooks/useSinEvaluaciones";
import FormularioEvaluacion from './components/FormNuevaEvaluacion';
import NavegacionEvaluaciones from "../components/NavegacionEvaluaciones";
import withReactContent from "sweetalert2-react-content";

import Swal from "sweetalert2";

const IndexSinEvaluacionesAdministrador = () => {
  const { sinevaluaciones} = useSinEvaluaciones();
  
  const MySwal = withReactContent(Swal);
  const [selectedEmployeeId, setSelectedEmployeeId] = useState(null);
  const [selectedEmployeeName, setSelectedEmployeeName] = useState(null);
  const [selectedRowCount, setSelectedRowCount] = useState(0); // State for selected row count


  const handleNuevaEvaluacionClick = () => {
    if (selectedEmployeeId === null || selectedRowCount !== 1) {
      MySwal.fire({
        icon: "error",
        title: "Error",
        text: selectedRowCount === 0 ? "Seleccione un empleado para agregar un nuevo contrato." : "Seleccione solo un empleado para agregar un nuevo contrato.",
      });
    } else (selectedEmployeeId === 1); {
      MySwal.fire({
        title: "Evaluacion de Desempeño",
        html: <FormularioEvaluacion selectedEmployeeId={selectedEmployeeId} selectedEmployeeName={selectedEmployeeName} />,
        showCancelButton: true,
        showCloseButton: true,
        reverseButtons: true,
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Crear",
        width: "50%",
      });
    }
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
      
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start my-3 ">
          <h1 className="ms-0 me-10">
            Total de Empleados Sin Evaluaciones{" "}
            <span className="text-blue-700">{sinevaluaciones.length}</span>{" "}
          </h1>
        </div>
        <div className="flex justify-end">
         
          <button
            className="bg-blue-700 text-white py-2 px-5 rounded-lg"
            onClick={handleNuevaEvaluacionClick}
          >
            Nuevo 
          </button>
        </div>
      </div>

      <div className="h-full">
        <TableSinEvaluaciones sinevaluaciones={sinevaluaciones} setSelectedEmployeeId={setSelectedEmployeeId} setSelectedEmployeeName={setSelectedEmployeeName} setSelectedRowCount={setSelectedRowCount}/>
      </div>
    </>
  );
};


export default IndexSinEvaluacionesAdministrador;
