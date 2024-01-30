import React, { useState, useEffect } from "react";
import {
  RiEdit2Line,
  RiShieldCheckLine,
} from "react-icons/ri";

import useAuthEmpleado from "../../../hooks/useAuthEmpleado";



const Configuracion = () => {
  const {obtenerMisDatosUsuario, actualizarMisDatosUsuario} = useAuthEmpleado();
  const perfil = obtenerMisDatosUsuario?.perfil || {}


  const [correoPersonal, setCorreoPersonal] = useState(perfil.correoPersonal || "");
  const [telefonoPersonal, setTelefonoPersonal] = useState(perfil.telefonoPersonal || "");
  const [editMode, setEditMode] = useState(false);
  const [correoValido, setCorreoValido] = useState(true);
  const [telefonoValido, setTelefonoValido] = useState(true);

  const [intentadoGuardar, setIntentadoGuardar] = useState(false);
  const [cancelado, setCancelado] = useState(false);

  const [enabled, setEnabled] = useState(false);

  const handleCorreoChange = (e) => {
    setCorreoPersonal(e.target.value);
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    setCorreoValido(regex.test(e.target.value));
  };

  const handleTelefonoChange = (e) => {
    setTelefonoPersonal(e.target.value);
    const regex = /^[0-9]{10}$/;
    setTelefonoValido(regex.test(e.target.value));
  };

  const handleEditarClick = () => {
    setIntentadoGuardar(false);
    setCancelado(false); // Reiniciar el estado cancelado
    setEditMode(true);
  };

  const handleGuardarClick = () => {
    setIntentadoGuardar(true);
    if (correoValido && telefonoValido) {
      actualizarMisDatosUsuario({ correoPersonal, telefonoPersonal });
      setEditMode(false);
    } else {
      alert("Por favor, corrige los campos antes de guardar.");
    }
  };

  const handleCancelarClick = () => {
    // Resetear los estados y desactivar el modo de edición
    setIntentadoGuardar(false);
    setCancelado(true);
    setCorreoPersonal(perfil.correoPersonal || "");
    setTelefonoPersonal(perfil.telefonoPersonal || "");
    setEditMode(false);
  };

  useEffect(() => {
    setCorreoPersonal(perfil.correoPersonal || "");
    setTelefonoPersonal(perfil.telefonoPersonal || "");
  }, [perfil.correoPersonal, perfil.telefonoPersonal]);


  return (
    <>
      {/* Profile */}
      <div className="bg-secondary-50 p-8 rounded-xl mb-8">
        <h1 className="text-xl ">Perfil</h1>
        <hr className="my-8 border-gray-500/30" />
        <form>
          <div className="flex items-center mb-8">
            <div className="w-1/4">
              <p>Avatar</p>
            </div>
            <div className="flex-1">
              <div className="relative mb-2">
                <img
                  src="https://img.freepik.com/foto-gratis/negocios-finanzas-empleo-concepto-mujeres-emprendedoras-exitosas-joven-empresaria-segura-anteojos-mostrando-gesto-pulgar-arriba-sostenga-computadora-portatil-garantice-mejor-calidad-servicio_1258-59118.jpg"
                  className="w-28 h-28 object-cover rounded-lg"
                />
                <label
                  htmlFor="avatar"
                  className="absolute bg-secondary-100 p-2 rounded-full hover:cursor-pointer -top-2 left-24"
                >
                  <RiEdit2Line />
                </label>
                <input type="file" id="avatar" className="hidden" />
              </div>
              <p className="text-gray-500 text-sm">
                Tipos de archivos permitidos: png, jpg, jpeg.
              </p>
            </div>
          </div>
          <div className="flex flex-col gap-y-2 md:flex-row md:items-center mb-8">
            <div className="w-full md:w-1/4">
              <p>
                Nombre completo
              </p>
            </div>
            <div className="flex-1 flex items-center gap-4">
              <div className="w-full">
                <input
                  type="text"
                  className="w-full py-2 px-4 outline-none rounded-lg bg-gray-200 border border-gray-300 tex-black"
                  value={perfil.nombre || ""}
                  disabled
                />
              </div>
              <div className="w-full">
                <input
                  type="text"
                  className="w-full py-2 px-4 outline-none rounded-lg bg-gray-200 border border-gray-300"
                  value={perfil.apellido || ""}
                  disabled
                />
              </div>
            </div>
          </div>
          <div className="flex flex-col md:flex-row md:items-center gap-y-2 mb-8">
            <div className="w-full md:w-1/4">
              <p>
                Correo personal
              </p>
            </div>
            <div className="flex-1">
          <input
            type="email"
            className={`w-full py-2 px-4 outline-none rounded-lg border ${
              (editMode && !correoValido) ? "border-red-500" : ""
            } ${
              editMode ? "bg-white border-gray-300" : "bg-gray-200 border-gray-300"
            }`}
            value={correoPersonal}
            onChange={handleCorreoChange}
            disabled={!editMode}
          />
          {editMode && !correoValido && (
            <p className="text-red-500 text-sm">Por favor, ingresa un correo válido.</p>
          )}
        </div>
          </div>
          <div className="flex flex-col md:flex-row md:items-center gap-y-2 mb-8">
            <div className="w-full md:w-1/4">
              <p>
                Número de contacto 
              </p>
            </div>
            <div className="flex-1">
          <input
            type="tel"
            pattern="[0-9]{10}"
            className={`w-full py-2 px-4 outline-none rounded-lg border ${
              (editMode && !telefonoValido) ? "border-red-500" : ""
            } ${
              editMode ? "bg-white border-gray-300" : "bg-gray-200 border-gray-300"
            }`}
            value={telefonoPersonal}
            onChange={handleTelefonoChange}
            disabled={!editMode}
          />
          {editMode && !telefonoValido && (
            <p className="text-red-500 text-sm">Por favor, ingresa un número de teléfono válido (10 dígitos numéricos).</p>
          )}
        </div>
            </div>
        </form>
        <hr className="my-8 border-gray-500/30" />
        <div className="flex justify-end">
        {editMode ? (
          <>
            <button
              className="bg-primary/50 py-3 px-4 rounded-lg hover:bg-primary transition-colors"
              onClick={handleGuardarClick}
            >
              Guardar
            </button>
            <button
              className="bg-red-300 py-3 px-4 rounded-lg ml-4 hover:bg-red-400 transition-colors"
              onClick={handleCancelarClick}
            >
              Cancelar
            </button>
          </>
        ) : (
          <button
            className="bg-primary/50 py-3 px-4 rounded-lg hover:bg-primary transition-colors"
            onClick={handleEditarClick}
          >
            Editar
          </button>
        )}
      </div>
      </div>
      {/* Cambiar contraseña */}
      <div className="bg-secondary-50 p-8 rounded-xl mb-8">
        <h1 className="text-xl ">Usuario y contraseña</h1>
        <hr className="my-8 border-gray-500/30" />
        <form className="mb-8">
          <div className="flex flex-col md:flex-row md:items-center gap-y-4 justify-between">
            <div>
              <h5 className=" text-xl mb-1">Correo institucional</h5>
              <p className="text-gray-500 text-sm">{perfil.correoInstitucional}</p>
            </div>
          </div>
          <hr className="my-8 border-gray-500/30 border-dashed" />
          <div className="flex flex-col md:flex-row md:items-center gap-y-4 justify-between">
            <div>
              <h5 className=" text-xl mb-1">Contraseña</h5>
              <p className="text-gray-500 text-sm">****************</p>
            </div>
            <div>
              <button className="w-full md:auto bg-primary/50 py-3 px-4 rounded-lg hover:bg-primary  transition-colors">
                Cambiar contraseña
              </button>
            </div>
          </div>
        </form>
        <div className="grid grid-cols-1 md:grid-cols-8 items-center gap-y-4 bg-primary/10 p-4 rounded-lg border border-dashed border-primary">
          <div className="flex justify-center">
            <RiShieldCheckLine className="text-5xl text-green-600" />
          </div>
          <div className="md:col-span-6">
            <h5 className=" text-xl mb-2">Contraseña segura</h5>
            <p className="text-gray-500">
            La contraseña debe tener al menos 6 caracteres y se recomienda incluir una combinación de letras mayúsculas, minúsculas, números y caracteres especiales para mejorar la seguridad.
            </p>
          </div>
        </div>
      </div> 
    </>
  );
};

export default Configuracion;
