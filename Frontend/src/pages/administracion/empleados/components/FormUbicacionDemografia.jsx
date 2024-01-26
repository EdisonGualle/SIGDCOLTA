import React from "react";

const FormUbicacionDemografia = ({ handleNext, handlePrev }) => {
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
            htmlFor="entidad"
            className="block text-sm font-medium text-gray-600"
          >
            Entidad
          </label>
          <select
            id="entidad"
            name="entidad"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            {/* Opciones para entidad */}
          </select>
        </div>

        <div className="mb-4">
          <label
            htmlFor="nacionalidad"
            className="block text-sm font-medium text-gray-600"
          >
            Nacionalidad
          </label>
          <input
            type="text"
            id="nacionalidad"
            name="nacionalidad"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label
            htmlFor="cantonNacimiento"
            className="block text-sm font-medium text-gray-600"
          >
            Cantón Nacimiento
          </label>
          <input
            type="text"
            id="cantonNacimiento"
            name="cantonNacimiento"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label
            htmlFor="fechaNacimiento"
            className="block text-sm font-medium text-gray-600"
          >
            Fecha Nacimiento
          </label>
          <input
            type="date"
            id="fechaNacimiento"
            name="fechaNacimiento"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        {/* Columna 2 */}
        <div className="mb-4">
          <label
            htmlFor="provinciaNacimiento"
            className="block text-sm font-medium text-gray-600"
          >
            Provincia Nacimiento
          </label>
          <select
            id="provinciaNacimiento"
            name="provinciaNacimiento"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            {/* Opciones para provinciaNacimiento */}
          </select>
        </div>

        <div className="mb-4">
          <label
            htmlFor="ciudadNacimiento"
            className="block text-sm font-medium text-gray-600"
          >
            Ciudad Nacimiento
          </label>
          <select
            id="ciudadNacimiento"
            name="ciudadNacimiento"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            {/* Opciones para ciudadNacimiento */}
          </select>
        </div>

        <div className="mb-4">
          <label
            htmlFor="direccion"
            className="block text-sm font-medium text-gray-600"
          >
            Dirección
          </label>
          <input
            type="text"
            id="direccion"
            name="direccion"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label
            htmlFor="descripcionDomicilio"
            className="block text-sm font-medium text-gray-600"
          >
            Descripción de Domicilio
          </label>
          <textarea
            id="descripcionDomicilio"
            name="descripcionDomicilio"
            rows="3"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          ></textarea>
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

export default FormUbicacionDemografia;
