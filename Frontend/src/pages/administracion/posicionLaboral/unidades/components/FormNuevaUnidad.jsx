import React from "react";

const FormNuevaDireccion = ({ direcciones }) => {
  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {/* Columna 1 */}
        <div className="mb-4">
          <label
            htmlFor="nombre"
            className="block text-sm font-medium text-gray-600"
          >
            Nombre
          </label>
          <input
            type="text"
            id="nombre"
            name="nombre"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label
            htmlFor="nombre"
            className="block text-sm font-medium text-gray-600"
          >
            Telefono
          </label>
          <input
            type="text"
            id="telefono"
            name="telefono"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label
            htmlFor="descripcion"
            className="block text-sm font-medium text-gray-600"
          >
            Descripción
          </label>
          <textarea
            id="descripcion"
            name="descripcion"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          ></textarea>
        </div>

        <div className="mb-4">
          <label
            htmlFor="descripcion"
            className="block text-sm font-medium text-gray-600"
          >
            Dirección Perteneciente
          </label>
          <select
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            name="direcciones"
            id="direcciones"
            defaultValue={undefined}
          >
            <option value="" hidden>
              Seleccionar Dirección
            </option>
            {direcciones.map((direccion) => {
              return (
                <option key={direccion.id} value={direccion.id}>
                  {direccion.nombre}
                </option>
              );
            })}
          </select>
        </div>
      </form>
    </div>
  );
};

export default FormNuevaDireccion;
