import React, { useState, useEffect } from "react";
import useAuthEmpleado from "../../../../../hooks/useAuthEmpleado";
export default function CardSettings() {
  const { miInformacion,obtenerMiInformacion } = useAuthEmpleado();
  
  useEffect(() => {
    obtenerMiInformacion();
  }, []);


  const informacionPersonal = miInformacion?.informacionPersonal || {};
  const informacionContacto = miInformacion?.informacionContacto || {};
  const informacionAdicional = miInformacion?.informacionAdicional || {};
  const ubicacionGeografica = miInformacion?.ubicacionGeografica || {};


  return (
    <>
      <div className="relative flex flex-col min-w-0 break-words w-full  rounded-lg bg-blueGray-100 border-0">
        <div className="rounded-tr-lg bg-blue-200	 mb-0 px-6 py-6">
          <div className="text-center flex justify-between">
            <h6 className="text-sm font-bold text-gray-900 uppercase ps-8  py-1">Datos Personales</h6>
          </div>
        </div>
        <div
          className="flex-auto px-4 lg:px-10 py-10 pt-0 bg-indigo-100 rounded-br-lg max-h-screen overflow-y-auto"
        >
          <form>
            <h6 className="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
              Informacion del empleado
            </h6>
            <div className="flex flex-wrap">
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Usuario
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionPersonal.usuario || ""}
                    disabled
                  />
                </div>
              </div>
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Cedula
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 after:rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionPersonal.cedula || ""}
                    disabled
                  />
                </div>
              </div>
              {/* Nombres */}
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Nombres
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionPersonal.nombre || ""}
                    disabled
                  />
                </div>
              </div>
              {/* Apellidos */}
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Apellidos
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionPersonal.apellido || ""}
                    disabled
                  />
                </div>
              </div>
              {/* Fecha */}
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Fecha de nacimiento
                  </label>
                  <input
                    type="date"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionPersonal.fechaNacimiento || ""}
                    disabled
                  />
                </div>
              </div>
              {/* Genero */}
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Genero
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionPersonal.genero || ""}
                    disabled
                  />
                </div>
              </div>
            </div>
            <hr className="mt-6 border-b-1 border-blueGray-300" />
            {/* Informaicon de contacto */}
            <h6 className="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
              informacion Contacto
            </h6>
            <div className="flex flex-wrap">
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Teléfono Personal
                  </label>
                  <input
                    type="tel"
                    pattern="[0-9]{10}"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionContacto.telefonoPesonal || ""}
                    disabled
                  />
                </div>
              </div>
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Teléfono Trabajo
                  </label>
                  <input
                    type="tel"
                    pattern="[0-9]{10}"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionContacto.telefonoTrabajo || ""}
                    disabled
                  />
                </div>
              </div>
              {/* Nombres */}
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Correo Personal
                  </label>
                  <input
                    type="email"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionContacto.correoPersonal || ""}
                    disabled
                  />
                </div>
              </div>
              {/* Apellidos */}
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Correo institucional
                  </label>
                  <input
                    type="email"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionContacto.correoInstitucional || ""}
                    disabled
                  />
                </div>
              </div>
            </div>
            {/* Informacion adicional */}
            <h6 className="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
              informacion adicional
            </h6>
            <div className="flex flex-wrap">
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Nacionalidad
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionAdicional.nacionalidad || ""}
                    disabled
                  />
                </div>
              </div>
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Etnia
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionAdicional.etnia || ""}
                    disabled
                  />
                </div>
              </div>
              {/* Estado civil*/}
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Estado civil
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionAdicional.estadoCivil || ""}
                    disabled
                  />
                </div>
              </div>
              {/* Tipo de sangre */}
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Tipo de sangre
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={informacionAdicional.tipoSangre || ""}
                    disabled
                  />
                </div>
              </div>

            </div>
            {/* Ubicacion Geografica */}
            <h6 className="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
              ubicación geográfica
            </h6>
            <div className="flex flex-wrap">
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Provincia
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={ubicacionGeografica.provincia || ""}
                    disabled
                  />
                </div>
              </div>
              <div className="w-full lg:w-6/12 px-4">
                <div className="relative w-full mb-3">
                  <label
                    className="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Cantón
                  </label>
                  <input
                    type="text"
                    className="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-300 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    value={ubicacionGeografica.canton || ""}
                    disabled
                  />
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </>
  );
}
