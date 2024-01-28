import React from "react";

import Configuracion from "../../../../layouts/components/Configuracion"
// components

export default function CardConfiguracion() {

  return (
    <>
      <div className="relative flex flex-col min-w-0 break-words bg-indigo-100 w-full  rounded-br-lg rounded-tr-lg">
        <div className="rounded-tr-lg  bg-red-200		  mb-0 px-6 py-6 w-full">
          <div className="text-center flex justify-between">
            <h6 className="text-sm font-bold uppercase ps-8 py-1">Configuración</h6>
            {/* <button
              className="bg-black text-white active:bg-lightBlue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
              type="button"
            >
              Guardar
            </button> */}
          </div>
        </div>
        <div className="px-10">
          {/* Table Instruccion Formal */}
          <div className="w-full  lg:w-12/12  ">
            <h1 className="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Configuración</h1>
            <Configuracion/>
          </div>
        </div>
      </div>
    </>
  );
}
