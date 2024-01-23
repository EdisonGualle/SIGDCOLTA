import React from "react";
const FormDatosBancarios = ({ handlePrev }) => {
  const handleSubmit = (e) => {
    e.preventDefault();
    // Puedes realizar lógica de validación o enviar datos al backend aquí

    // Llama a la función onNext para pasar al siguiente formulario
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
            htmlFor="nombreBanco"
            className="block text-sm font-medium text-gray-600"
          >
            Nombre del Banco
          </label>
          <input
            type="text"
            id="nombreBanco"
            name="nombreBanco"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label
            htmlFor="numeroCuenta"
            className="block text-sm font-medium text-gray-600"
          >
            Número de Cuenta
          </label>
          <input
            type="text"
            id="numeroCuenta"
            name="numeroCuenta"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        {/* Columna 2 */}
        <div className="mb-4">
          <label
            htmlFor="tipoCuenta"
            className="block text-sm font-medium text-gray-600"
          >
            Tipo de Cuenta
          </label>
          <select
            id="tipoCuenta"
            name="tipoCuenta"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            {/* Opciones para tipoCuenta */}
          </select>
        </div>

        {/* Botón de Siguiente */}
      </form>
      <div className="col-span-3 flex justify-end ">
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
          GUARDAR
        </button>
      </div>
    </div>
  );
};

export default FormDatosBancarios;
