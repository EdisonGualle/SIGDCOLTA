import React from "react";
import TableAgregarContrato from "./components/TableAgregarContrato";
import useAsignarContrato from "../../../hooks/useAsiganarContrato";
import FormNuevoTipoContrato from "./components/FormNuevoTipoContrato";
import NavegacionContratos from "./components/NavegacionContratos";

import withReactContent from "sweetalert2-react-content";
import Swal from "sweetalert2";

const IndexAgregarContratosAdministrador = () => {
  const { tiposContrato } = useAsignarContrato();
  // const empleadosHombres = tiposContrato.filter(
  //   (posicion) => posicion.genero === "Masculino"
  // );
  // const empleadosMujeres = tiposContrato.filter(
  //   (posicion) => posicion.genero === "Femenino"
  // );
  const MySwal = withReactContent(Swal);
  console.log("Datos traídos del provider:", tiposContrato);

  const handleEliminarTipoContratoClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará el tipo de contrato. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Lógica para eliminar el tipo de contrato
        MySwal.fire("Eliminado", "El tipo de contrato ha sido eliminado.", "success");
      }
    });
  };

  const handleNuevoTipoContratoClick = () => {
    MySwal.fire({
      title: "Nuevo Tipo de Contrato",
      html: <FormNuevoTipoContrato />, // Renderiza el formulario de nuevo empleado en el contenido del SweetAlert
      showCancelButton: true,
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
          {/* <h1 className="">
            Empleados Hombres:{" "}
            <span className="text-green-700">{empleadosHombres}</span>
          </h1>
          <h1 className="mx-10">
            Empleados Mujeres:{" "}
            <span className="text-red-700">{empleadosMujeres.length}</span>
          </h1> */}
        </div>
      </div>
      <div className="h-full">
        <TableAgregarContrato tiposContrato={tiposContrato} />
      </div>
    </>
  );
};

export default IndexAgregarContratosAdministrador;
