import React from "react";

const FormNuevaTiposCapacitaciones = () => {
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

        <div className="mb-4">
          <label htmlFor="tipoEvento" className="block text-sm font-medium text-gray-600">
            Tipo de Evento
          </label>
          <input
            type="text"
            id="tipoEvento"
            name="tipoEvento"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        {/* Columna 2 */}
        <div className="mb-4">
          <label htmlFor="institucion" className="block text-sm font-medium text-gray-600">
            Institución
          </label>
          <input
            type="text"
            id="institucion"
            name="institucion"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label htmlFor="cantidadHoras" className="block text-sm font-medium text-gray-600">
            Cantidad de Horas
          </label>
          <input
            type="number"
            id="cantidadHoras"
            name="cantidadHoras"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        {/* Columna 3 */}
        <div className="mb-4">
          <label htmlFor="fecha" className="block text-sm font-medium text-gray-600">
            Fecha
          </label>
          <input
            type="date"
            id="fecha"
            name="fecha"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>
      </form>
    </div>
  );
};

export default FormNuevaTiposCapacitaciones;
