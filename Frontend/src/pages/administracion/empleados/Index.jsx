// eslint-disable-next-line no-unused-vars
import React from "react";
import TableEmpleados from "./components/TableEmpleados";
import useEmpleados from "../../../hooks/useEmpleados";
import FormNuevoEmpleado from "./components/FormNuevoEmpleado";
import withReactContent from "sweetalert2-react-content";
import Swal from "sweetalert2";

const IndexEmpleadosAdministrador = () => {
  const { empleados } = useEmpleados();
  const MySwal = withReactContent(Swal);

  const handleEliminarClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará al usuario. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la lógica para eliminar al usuario
        MySwal.fire("Eliminado", "El usuario ha sido eliminado.", "success");
      }
    });
  };

  const handleNuevoClick = () => {
    MySwal.fire({
      title: "Nuevo Empleado",
      html: <FormNuevoEmpleado />, // Renderiza el formulario de nuevo empleado en el contenido del SweetAlert
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
          <h1 className="mx-10">
            Empleados Activos: <span className="text-blue-700">12</span>{" "}
          </h1>
          <h1 className="">
            Empleados Inactivos: <span className="text-red-700">12</span>
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
            onClick={handleNuevoClick} // Agrega el manejador de clic para el botón "Nuevo"
          >
            Nuevo
          </button>
        </div>
        <div className="flex justify-start">
          <div className="w-64">
            <label
              htmlFor="menu"
              className="block text-sm font-medium text-gray-700"
            >
              Selecciona una opción:
            </label>
            <select
              id="menu"
              name="menu"
              className="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            >
              <optgroup label="Usuario">
                <option value="deshabilitar-usuario">
                  Deshabilitar usuario
                </option>
                <option value="habilitar-usuario">Habilitar usuario</option>
                <option value="eliminar-usuario">Eliminar usuario</option>
              </optgroup>
              <optgroup label="Asignar">
                <option value="asignar-horario">Asignar horario</option>
                <option value="asignar-rol">Asignar rol</option>
              </optgroup>
              <optgroup label="Posición Laboral">
                <option value="asignar-direccion">Asignar Dirección</option>
                <option value="asignar-unidad">Asignar unidad</option>
                <option value="asignar-cargo">Asignar cargo</option>
              </optgroup>
            </select>
          </div>
        </div>
      </div>
      <div className="h-full">
        <TableEmpleados empleados={empleados} />
      </div>
    </>
  );
};

export default IndexEmpleadosAdministrador;
