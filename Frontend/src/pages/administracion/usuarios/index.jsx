import React from "react";
import { useState } from "react";
import useUsuarios from "../../../hooks/useUsuarios";
import TableUsuarios from "./components/TableUsuarios";
// import FormNuevoUsuario from "./components/FormNuevoUsuario";
import useRoles from "../../../hooks/useRoles";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";

import FormEditarRol from "./components/FromEditarRol";

const IndexUsuariosAdministrador = () => {
  const { usuarios, cargandoUsuarios } = useUsuarios();
  const { roles } = useRoles();

  const MySwal = withReactContent(Swal);

  const handleEliminarClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción desactivara al Usuario. ¿Quieres continuar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#ec4899",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, desactivar",
      cancelButtonText: "No, Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la lógica para eliminar al usuario
        MySwal.fire("Desactivado", "Usuario desactivado.", "success");
      }
    });
  };

  const handleNuevoClick = () => {
    MySwal.fire({
      title: "Nuevo Usuario",
      html: <FormNuevoUsuario unidades={unidades} />,
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
        MySwal.fire("Success", "Usuario creado correctamente", "success");
      }
    });
  };

  const [opcionSeleccionada, setOpcionSeleccionada] = useState("");

  const handleOpcionChange = (event) => {
    setOpcionSeleccionada(event.target.value);
    mostrarAlerta(event.target.value); // Llamar a la función mostrarAlerta directamente
  };

  const mostrarAlerta = (opcion) => {
    switch (opcion) {
      case "eliminar-usuario":
        const swalWithButtons = Swal.mixin({
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          buttonsStyling: true
        });
        swalWithButtons.fire({
          title: "¿Estás seguro de que quieres eliminar este usuario?",
          text: "¡Todos los datos relacionados con el usuario se eliminaran definitivamente de nuestros registros y no se podran recuperar!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, eliminar !",
          cancelButtonText: "No, cancelar!",
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            swalWithButtons.fire({
              title: "¡Eliminado!",
              text: "El usuario se ha eliminado correctamente",
              icon: "success"
            });
          }
        });
        break;
        
      case "deshabilitar-usuario":
        MySwal.fire({
          title: "¿Estás seguro?",
          text: "Esta acción desactivara al Usuario. ¿Quieres continuar?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#ec4899",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Sí, desactivar",
          cancelButtonText: "No, Cancelar",
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            // Aquí puedes realizar la lógica para eliminar al usuario
            MySwal.fire("Desactivado", "Usuario desactivado.", "success");
          }
        });
        break;
        case "habilitar-usuario":
          MySwal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción habilitara al Usuario. ¿Quieres continuar?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#655cc9",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, activar",
            cancelButtonText: "No, Cancelar",
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              // Aquí puedes realizar la lógica para eliminar al usuario
              MySwal.fire("Activado", "Usuario Activado.", "success");
            }
          });
          break;
      case "editar-rol":
        MySwal.fire({
          title: "Editar Rol",
          html: <FormEditarRol roles={roles} />,
          showCancelButton: true,
          showCloseButton: true,
          reverseButtons: true,
          cancelButtonColor: "#d33",
          confirmButtonColor: "#3085d6",
          cancelButtonText: "Cancelar",
          confirmButtonText: "Guardar",
          width: "50%",
        }).then((result) => {
          if (result.isConfirmed) {
            // Lógica para guardar el rol
            Swal.fire("Guardado", "Rol editado correctamente", "success");
          }
        });
        break;
      case "eliminar-rol":
        MySwal.fire({
          title: "¿Estás seguro?",
          text: "Esta acción eliminará el rol del usuario. ¿Quieres continuar?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Sí, eliminar",
          cancelButtonText: "Cancelar",
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            // Aquí puedes realizar la lógica para eliminar la unidad
            MySwal.fire("Eliminado", "El rol del usuario se ha eliminado.", "success");
          }
        });
        break;
      default:
        break;
    }
  };

  const usuariosActivos = usuarios.filter((usuario) => usuario.estado === 'activo');
  const usuariosInactivos = usuarios.filter((usuario) => usuario.estado === 'inactivo');
  return (
    <>
      <div className="uppercase bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start my-3">
          <h1 className="ms-0 me-10">
            Total de usuarios:{" "}
            <span className="text-blue-700">{usuarios.length}</span>{" "}
          </h1>
          <h1 className="">
            Usuarios Activos:{" "}
            <span className="text-green-700">{usuariosActivos.length}</span>
          </h1>
          <h1 className="mx-10">
            Usuarios Inactivos:{" "}
            <span className="text-red-700">{usuariosInactivos.length}</span>
          </h1>
        </div>
        <div className="flex justify-end">
          <button
            className="bg-pink-700 text-white mx-10 py-2 px-5 rounded-lg"
            onClick={handleEliminarClick}
          >
            Desactivar
          </button>

          <button
            className="bg-blue-700 text-white py-2 px-5 rounded-lg"
            onClick={handleNuevoClick}
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
              onChange={handleOpcionChange}
              value={opcionSeleccionada}
              className="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            >
              <optgroup label="Usuario">
                <option value="deshabilitar-usuario">
                  Deshabilitar usuario
                </option>
                <option value="habilitar-usuario">Habilitar usuario</option>
                <option value="eliminar-usuario">Eliminar usuario</option>
              </optgroup>
              <optgroup label="Rol">
                <option value="editar-rol">Editar rol</option>
                <option value="eliminar-rol">Eliminar rol</option>
              </optgroup>
            </select>
          </div>
        </div>
      </div>
      <div className="h-full">
        <TableUsuarios usuarios={usuarios} />
      </div>
    </>
  );
};

export default IndexUsuariosAdministrador;
