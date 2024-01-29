import React, { useState } from "react";

const FormNuevoEmpleado = ({
  handleNext,
  formDatosPersonales,
  setFormDatosPersonales,
}) => {
  const handleChange = (e) => {
    setFormDatosPersonales({
      ...formDatosPersonales,
      [e.target.name]: e.target.value,
    });
  };
  const [error, setError] = useState(false);

  const handleSubmit = (e) => {
    e.preventDefault();
    const camposObligatorios = [
      "cedula",
      "primerNombre",
      "segundoNombre",
      "primerApellido",
      "segundoApellido",
      "genero",
      "estadoCivil",
      "telefonoTrabajo",
      "telefonoPersonal",
      "tipoSangre",
    ];

    // Realiza la validación para cada campo
    /* for (const campo of camposObligatorios) {
      if (formDatosPersonales[campo].trim() === "") {
        setError(true);

        setTimeout(() => {
          setError(false);
        }, 3000);

        return;
      }
    } */

    handleNext();
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form className="" onSubmit={handleSubmit}>
        {error && (
          <div className="bg-red-500 py-1 px-3 text-white font-bold rounded-md text-center mt-2 mb-5">
            Por favor, completa todos los campos obligatorios.
          </div>
        )}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          {/* Columna 1 */}
          <div className="mb-4">
            <label
              htmlFor="cedula"
              className="block text-sm font-medium text-gray-600"
            >
              Cédula
            </label>
            <input
              type="text"
              id="cedula"
              name="cedula"
              onChange={handleChange}
              value={formDatosPersonales.cedula}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label
              htmlFor="primer nombre"
              className="block text-sm font-medium text-gray-600"
            >
              Pirmer Nombre
            </label>
            <input
              type="text"
              id="primerNombre"
              name="primerNombre"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={handleChange}
              value={formDatosPersonales.primerNombre}
            />
          </div>

          <div className="mb-4">
            <label
              htmlFor="segundo nombre"
              className="block text-sm font-medium text-gray-600"
            >
              Segundo Nombre
            </label>
            <input
              type="text"
              id="segundoNombre"
              name="segundoNombre"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={handleChange}
              value={formDatosPersonales.segundoNombre}
            />
          </div>

          <div className="mb-4">
            <label
              htmlFor="primerApellido"
              className="block text-sm font-medium text-gray-600"
            >
              Primer Apellido
            </label>
            <input
              type="text"
              id="primerApellido"
              name="primerApellido"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={handleChange}
              value={formDatosPersonales.primerApellido}
            />
          </div>

          <div className="mb-4">
            <label
              htmlFor="segundoApellido"
              className="block text-sm font-medium text-gray-600"
            >
              Segundo Apellido
            </label>
            <input
              type="text"
              id="segundoApellido"
              name="segundoApellido"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={handleChange}
              value={formDatosPersonales.segundoApellido}
            />
          </div>

          <div className="mb-4">
            <label
              htmlFor="genero"
              className="block text-sm font-medium text-gray-600"
            >
              Género
            </label>
            <select
              id="genero"
              name="genero"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={handleChange}
              value={formDatosPersonales.genero}
            >
              <option value="masculino">Masculino</option>
              <option value="femenino">Femenino</option>
              <option value="otro">Otro</option>
            </select>
          </div>

          <div className="mb-4">
            <label
              htmlFor="estadoCivil"
              className="block text-sm font-medium text-gray-600"
            >
              Estado Civil
            </label>
            <select
              id="estadoCivil"
              name="estadoCivil"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={handleChange}
              value={formDatosPersonales.estadoCivil}
            >
              <option value="soltero">Soltero</option>
              <option value="casado">Casado</option>
              <option value="otro">Otro</option>
            </select>
          </div>

          <div className="mb-4">
            <label
              htmlFor="telefonoTrabajo"
              className="block text-sm font-medium text-gray-600"
            >
              Telefono Trabajo
            </label>
            <input
              type="text"
              id="telefonoTrabajo"
              name="telefonoTrabajo"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              value={formDatosPersonales.telefonoTrabajo}
              onChange={handleChange}
            />
          </div>

          <div className="mb-4">
            <label
              htmlFor="telefonoPersonal"
              className="block text-sm font-medium text-gray-600"
            >
              Telefono Personal
            </label>
            <input
              type="text"
              id="telefonoPersonal"
              name="telefonoPersonal"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              value={formDatosPersonales.telefonoPersonal}
              onChange={handleChange}
            />
          </div>

          <div className="mb-4">
            <label
              htmlFor="tipoSangre"
              className="block text-sm font-medium text-gray-600"
            >
              Tipo de Sangre
            </label>
            <select
              id="tipoSangre"
              name="tipoSangre"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={handleChange}
              value={formDatosPersonales.tipoSangre}
            >
              <option value="a+">A+</option>
              <option value="b+">B+</option>
              <option value="o+">O+</option>
            </select>
          </div>
        </div>
        {/* Botón de Siguiente */}
        <div className="col-span-3 flex justify-end">
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

export default FormNuevoEmpleado;
