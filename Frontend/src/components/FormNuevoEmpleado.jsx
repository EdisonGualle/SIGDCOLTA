import React from "react";

const FormNuevoEmpleado = () => {
  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {/* Columna 1 */}
        <div className="mb-4">
          <label htmlFor="cedula" className="block text-sm font-medium text-gray-600">
            Cédula
          </label>
          <input
            type="text"
            id="cedula"
            name="cedula"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

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
          <label htmlFor="apellido" className="block text-sm font-medium text-gray-600">
            Apellido
          </label>
          <input
            type="text"
            id="apellido"
            name="apellido"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        {/* Columna 2 */}
        <div className="mb-4">
          <label htmlFor="genero" className="block text-sm font-medium text-gray-600">
            Género
          </label>
          <select
            id="genero"
            name="genero"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
          </select>
        </div>

        <div className="mb-4">
          <label htmlFor="estadoCivil" className="block text-sm font-medium text-gray-600">
            Estado Civil
          </label>
          <select
            id="estadoCivil"
            name="estadoCivil"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            <option value="soltero">Soltero</option>
            <option value="casado">Casado</option>
            <option value="otro">Otro</option>
          </select>
        </div>

        <div className="mb-4">
          <label htmlFor="movil" className="block text-sm font-medium text-gray-600">
            Móvil
          </label>
          <input
            type="text"
            id="movil"
            name="movil"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        {/* Columna 3 */}
        <div className="mb-4">
          <label htmlFor="tipoSangre" className="block text-sm font-medium text-gray-600">
            Tipo de Sangre
          </label>
          <select
            id="tipoSangre"
            name="tipoSangre"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          >
            <option value="a+">A+</option>
            <option value="b+">B+</option>
            <option value="o+">O+</option>
          </select>
        </div>

        <div className="mb-4">
          <label htmlFor="correo" className="block text-sm font-medium text-gray-600">
            Correo
          </label>
          <input
            type="email"
            id="correo"
            name="correo"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>
      </form>
    </div>
  );
};

export default FormNuevoEmpleado;
