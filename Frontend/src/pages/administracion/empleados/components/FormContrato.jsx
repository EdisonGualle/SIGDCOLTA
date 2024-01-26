import React from "react";

const FormContrato = ({ handleNext, handlePrev }) => {
  const handleSubmit = (e) => {
    e.preventDefault();
    // Puedes realizar lógica de validación o enviar datos al backend aquí
    // Llama a la función onNext para pasar al siguiente formulario
    handleNext();
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form
        className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
        onSubmit={handleSubmit}
      >
        {/* Columna 1 */}
        <div className="mb-4">
          <label
            htmlFor="direccion"
            className="block text-sm font-medium text-gray-600"
          >
            Dirección
          </label>
          <select
            id="direccion"
            name="direccion"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            {/* Opciones para dirección */}
          </select>
        </div>

        <div className="mb-4">
          <label
            htmlFor="unidad"
            className="block text-sm font-medium text-gray-600"
          >
            Unidad
          </label>
          <select
            id="unidad"
            name="unidad"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            {/* Opciones para unidad */}
          </select>
        </div>

        <div className="mb-4">
          <label
            htmlFor="cargo"
            className="block text-sm font-medium text-gray-600"
          >
            Cargo
          </label>
          <select
            id="cargo"
            name="cargo"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            {/* Opciones para cargo */}
          </select>
        </div>

        {/* Columna 2 */}
        <div className="mb-4">
          <label
            htmlFor="tipoContrato"
            className="block text-sm font-medium text-gray-600"
          >
            Tipo de Contrato
          </label>
          <select
            id="tipoContrato"
            name="tipoContrato"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            {/* Opciones para tipoContrato */}
          </select>
        </div>

        <div className="mb-4">
          <label
            htmlFor="fechaInicioContrato"
            className="block text-sm font-medium text-gray-600"
          >
            Fecha de Inicio del Contrato
          </label>
          <input
            type="date"
            id="fechaInicioContrato"
            name="fechaInicioContrato"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label
            htmlFor="fechaFinContrato"
            className="block text-sm font-medium text-gray-600"
          >
            Fecha de Fin del Contrato
          </label>
          <input
            type="date"
            id="fechaFinContrato"
            name="fechaFinContrato"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        {/* Columna 3 */}
        <div className="mb-4">
          <label
            htmlFor="salario"
            className="block text-sm font-medium text-gray-600"
          >
            Salario
          </label>
          <input
            type="text"
            id="salario"
            name="salario"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        {/* Botón de Siguiente */}
        <div className="col-span-3 flex justify-end">
          <button
            type="button"
            className="bg-yellow-700 text-white py-2 px-5 rounded-lg mr-5"
            onClick={handlePrev}
          >
            Anterior
          </button>
          <button
            type="submit"
            className="bg-blue-700 text-white py-2 px-5 rounded-lg"
          >
            Siguiente
          </button>
        </div>
      </form>
    </div>
  );
};

export default FormContrato;
