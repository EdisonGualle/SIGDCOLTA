import React from "react";
import TableContrato from "./components/TableContrato";
import useContratos from "../../../hooks/useContratos";
//import FormNuevoContrato from "./components/FormNuevoContrato";
import withReactContent from "sweetalert2-react-content";
import Swal from "sweetalert2";

const IndextipoContratosAdministrador = () => {
  const { contratos } = useContratos();

  console.log("Datos traídos del provider:", contratos);
  const MySwal = withReactContent(Swal);

  const handleEliminarContratoClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará el contrato. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Lógica para eliminar el contrato
        MySwal.fire("Eliminado", "El contrato ha sido eliminado.", "success");
      }
    });
  };

  const handleNuevoContratoClick = () => {
    setShowForm(true);
  };

  return (
    <>
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-end">
          <button
            className="bg-red-700 text-white mx-10 py-2 px-5 rounded-lg"
            onClick={handleEliminarContratoClick}
          >
            Eliminar 
          </button>


        </div>
      </div>
      <div className="h-full">
        <TableContrato contratos={contratos} />
      </div>

    
    </>
  );
};

export default IndextipoContratosAdministrador;