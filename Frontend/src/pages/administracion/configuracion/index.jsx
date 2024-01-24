import React, { useState } from "react";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";

const IndexConfiguracionAdministrador = () => {
  const MySwal = withReactContent(Swal);

  const handleGuardarClick = () => {
    MySwal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción cambiara las configuraciones del sistema. ¿Quieres continuar?",
      icon: "warning",
      reverseButtons: true,
      showCancelButton: true,
      confirmButtonColor: "#d6c533",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí, guardar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la lógica para eliminar la unidad
        MySwal.fire("Guardado", "Las configuraciones se han guardado correctamente.", "success");
      }
    });
  };
  
  return (
    <>
      <div className="flex">
        {/* Ingreso al sistema*/}
        <div className="w-1/3 p-4">
          <div className="bg-secondary-50 p-8 rounded-xl mb-8">
            <h1 className="text-xl">Inicio de sesión</h1>
            <hr className="my-8 border-gray-500/30" />
            <form>
              <div className="flex flex-col md:flex-row md:items-center gap-y-4 mb-4">
                <div className="w-full md:w-1/2 mb-2 md:mb-0">
                  <p>Número máximo de intentos</p>
                </div>
                <div className="flex justify-end">
                  <input
                    type="number"
                    min="3"
                    className="w-2/4 py-2 px-2 text-center outline-none rounded-lg bg-gray-200 border border-gray-300 text-sm"
                    placeholder="3"
                  />
                </div>
              </div>

              <div className="flex flex-col md:flex-row md:items-center gap-y-4">
                <div className="w-full md:w-1/2 mb-2 md:mb-0">
                  <p>Tiempo de bloqueo en minutos</p>
                </div>
                <div className="flex justify-end">
                  <input
                    type="number"
                    min="3"
                    className="w-2/4 py-2 px-2 text-center outline-none rounded-lg bg-gray-200 border border-gray-300 text-sm"
                    placeholder="3"
                  />
                </div>
              </div>
            </form>
            <hr className="my-8 border-gray-500/30" />
            <div className="flex justify-end">
              <button className="bg-primary/50 py-3 px-4 rounded-lg hover:bg-primary transition-colors"
              onClick={handleGuardarClick}>
                Guardar
              </button>
            </div>
          </div>
        </div>
        {/* Solicitud de permisos */}
        <div className="w-1/3 p-4">
          <div className="bg-secondary-50 p-8 rounded-xl mb-8">
            <h1 className="text-xl">Solicitud de permisos</h1>
            <hr className="my-8 border-gray-500/30" />
            <form>
              <div className="flex flex-col md:flex-row md:items-center gap-y-4 mb-4">
                <div className="w-full md:w-1/2 mb-2 md:mb-0">
                  <p>Días maximos de espera de aprobacion</p>
                </div>
                <div className="flex justify-end">
                  <input
                    type="number"
                    className="w-2/4 py-2 px-2  text-center outline-none rounded-lg bg-gray-200 border border-gray-300 text-sm"
                    placeholder="1"
                    min="1"
                  />
                </div>
              </div>

              <div className="flex flex-col md:flex-row md:items-center gap-y-4">
                <div className="w-full md:w-1/2 mb-2 md:mb-0">
                  <p>Número maximo de solicitudes mensuales </p>
                </div>
                <div className="flex justify-end">
                  <input
                    type="number"
                    className="w-2/4 py-2 px-2 text-center outline-none rounded-lg bg-gray-200 border border-gray-300 text-sm"
                    placeholder="3"
                    min="3"
                  />
                </div>
              </div>
            </form>
            <hr className="my-8 border-gray-500/30" />
            <div className="flex justify-end">
              <button className="bg-primary/50 py-3 px-4 rounded-lg hover:bg-primary transition-colors"
                onClick={handleGuardarClick}>
                Guardar
              </button>
            </div>
          </div>
        </div>
        {/* tercera sesion */}
        <div className="w-1/3 p-4">
          <div className="bg-secondary-50 p-8 rounded-xl mb-8">
            <h1 className="text-xl">Ejemplo</h1>
            <hr className="my-8 border-gray-500/30" />
            <form>
              <div className="flex flex-col md:flex-row md:items-center gap-y-4 mb-4">
                <div className="w-full md:w-1/2 mb-2 md:mb-0">
                  <p>Número máximo de ejemplo</p>
                </div>
                <div className="flex justify-end">
                  <input
                    type="number"
                    min="3"
                    className="w-2/4 py-2 px-2 text-center outline-none rounded-lg bg-gray-200 border border-gray-300 text-sm"
                    placeholder="3"
                  />
                </div>
              </div>
              <div className="flex flex-col md:flex-row md:items-center gap-y-4">
                <div className="w-full md:w-1/2 mb-2 md:mb-0">
                  <p>Tiempo de ejemplo en minutos</p>
                </div>
                <div className="flex justify-end">
                  <input
                    type="number"
                    min="3"
                    className="w-2/4 py-2 px-2 text-center outline-none rounded-lg bg-gray-200 border border-gray-300 text-sm"
                    placeholder="3"
                  />
                </div>
              </div>
            </form>
            <hr className="my-8 border-gray-500/30" />
            <div className="flex justify-end">
              <button className="bg-primary/50 py-3 px-4 rounded-lg hover:bg-primary transition-colors"
              onClick={handleGuardarClick}>
                Guardar
              </button>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default IndexConfiguracionAdministrador;
