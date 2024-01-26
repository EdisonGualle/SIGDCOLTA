import React from "react";

const FormNuevaDireccion = () => {
  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {/* Columna 1 */}
        <div className="mb-4">
          <label htmlFor="nombre" className="block text-sm font-medium text-gray-600">
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
          <label htmlFor="descripcion" className="block text-sm font-medium text-gray-600">
            Descripción
          </label>
          <textarea
            id="descripcion"
            name="descripcion"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          ></textarea>
        </div>

        {/* Columna 2 */}
        {/* Agrega más campos según sea necesario para el formulario de departamento */}

        {/* Columna 3 */}
        {/* Agrega más campos según sea necesario para el formulario de departamento */}
      </form>
    </div>
  );
};

export default FormNuevaDireccion;
