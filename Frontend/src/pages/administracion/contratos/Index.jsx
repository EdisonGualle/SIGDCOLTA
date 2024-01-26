import React from "react";
import TableContrato from "./components/TableContrato";
import useContratos from "../../../hooks/useContratos";
import FormNuevoContrato from "./components/FormNuevoContrato";
import withReactContent from "sweetalert2-react-content";
import Swal from "sweetalert2";
import NavegacionContratos from "./components/NavegacionContratos";

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
    MySwal.fire({
      title: "Nuevo Contrato",
      html: <FormNuevoContrato />, // Renderiza el formulario de nuevo empleado en el contenido del SweetAlert
      showCancelButton: false,
      showConfirmButton: false,
      cancelButtonColor: "#3085d6",
      width: "50%",
    });
  };

  return (
    <>
      <NavegacionContratos />
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
      <div className="flex justify-start my-3 ">
          <h1 className="ms-0 me-10">
            Total de Empleados Contratados :{" "}
            <span className="text-blue-700">{contratos.length}</span>{" "}
          </h1>
        </div>
        <div className="flex justify-end">
          <button
            className="bg-red-700 text-white mx-10 py-2 px-5 rounded-lg"
            onClick={handleEliminarContratoClick}
          >
            Eliminar
          </button>
          <button
            className="bg-blue-700 text-white py-2 px-5 rounded-lg"
            onClick={handleNuevoContratoClick}
          >
            Nuevo
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