import React, { useState } from 'react';

import TableAgregarContrato from "./components/TableAgregarContrato";
import useAsignarContrato from "../../../hooks/useAsiganarContrato";
import FormNuevoContrato from "./components/FormNuevoContrato";
import NavegacionContratos from "./components/NavegacionContratos";

import withReactContent from "sweetalert2-react-content";
import Swal from "sweetalert2";

const IndexAgregarContratosAdministrador = () => {
  const { tiposContrato } = useAsignarContrato();

  const MySwal = withReactContent(Swal);
  const [selectedEmployeeId, setSelectedEmployeeId] = useState(null);
  const [selectedEmployeeName, setSelectedEmployeeName] = useState(null);



  const handleNuevoContratoClick = () => {
    MySwal.fire({
      title: "Nuevo Tipo de Contrato",
      html: <FormNuevoContrato selectedEmployeeId={selectedEmployeeId} selectedEmployeeName={selectedEmployeeName} />,
      showCancelButton: false,
      showConfirmButton: false,
      cancelButtonColor: "#3085d6",
      cancelButtonText: "Cerrar",
      width: "50%",
    });
  };
  return (
    <>
     <NavegacionContratos />
     <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start my-3 ">
          <h1 className="ms-0 me-10">
            Total de empleados:{" "}
            <span className="text-blue-700">{tiposContrato.length}</span>{" "}
          </h1>
        </div>
        <div className="flex justify-end">
         
          <button
            className="bg-blue-700 text-white py-2 px-5 rounded-lg"
            onClick={handleNuevoContratoClick}
          >
            Nuevo 
          </button>
        </div>
        
      </div>
      
      <div className="h-full">
        <TableAgregarContrato tiposContrato={tiposContrato} setSelectedEmployeeId={setSelectedEmployeeId} setSelectedEmployeeName={setSelectedEmployeeName}/>

      </div>
    </>
  );
};

export default IndexAgregarContratosAdministrador;
