import React from "react";
import TabletipoContrato from "./components/TabletipoContrato";
import usetipoContratos from "../../../hooks/usetipoContratos";
import FormNuevoTipoContrato from "./components/FormNuevoTipoContrato";
import NavegacionContratos from "./components/NavegacionContratos";

import withReactContent from "sweetalert2-react-content";
import Swal from "sweetalert2";

const IndextipoContratosAdministrador = () => {
  const { tiposContrato } = usetipoContratos();
  // console.log("IndextipoContrato:", tiposContrato);
  const MySwal = withReactContent(Swal);
  

  // const handleEliminarTipoContratoClick = () => {
  //   MySwal.fire({
  //     title: "¿Estás seguro?",
  //     text: "Esta acción eliminará el tipo de contrato. ¿Quieres continuar?",
  //     icon: "warning",
  //     showCancelButton: true,
  //     confirmButtonColor: "#d33",
  //     cancelButtonColor: "#3085d6",
  //     confirmButtonText: "Sí, eliminar",
  //     cancelButtonText: "Cancelar",
  //   }).then((result) => {
  //     if (result.isConfirmed) {
  //       // Lógica para eliminar el tipo de contrato
  //       MySwal.fire("Eliminado", "El tipo de contrato ha sido eliminado.", "success");
  //     }
  //   });
  // };

  const handleNuevoTipoContratoClick = () => {
    MySwal.fire({
      title: "Nuevo Tipo de Contrato",
      html: <FormNuevoTipoContrato />, // Renderiza el formulario de nuevo empleado en el contenido del SweetAlert
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
            Total de Tipos de Contrato:{" "}
            <span className="text-blue-700">{tiposContrato.length}</span>{" "}
          </h1>
        </div>
        <div className="flex justify-end">
          {/* <button
            className="bg-red-700 text-white mx-10 py-2 px-5 rounded-lg"
            onClick={handleEliminarTipoContratoClick}
          >
            Eliminar 
          </button> */}

          <button
            className="bg-blue-700 text-white py-2 px-5 rounded-lg"
            onClick={handleNuevoTipoContratoClick}
          >
            Nuevo 
          </button>
        </div>
      </div>
      <div className="h-full">
        <TabletipoContrato tiposContrato={tiposContrato} />
      </div>
    </>
  );
};

export default IndextipoContratosAdministrador;
