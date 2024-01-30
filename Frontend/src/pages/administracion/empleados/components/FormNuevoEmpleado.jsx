import React, { useState } from "react";
import useEmpleados from "../../../../hooks/useEmpleados";
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

  const { validarCedulas } = useEmpleados();

  const [error, setError] = useState(false);
  const [errorMessage, setErrorMessage] = useState(null);
  const handleSubmit = (e) => {
    e.preventDefault();
    const camposObligatorios = [
      "cedula",
      "primerNombre",
      "segundoNombre",
      "primerApellido",
      "segundoApellido",
      "genero",
      "correo",
      "estadoCivil",
      "telefonoTrabajo",
      "telefonoPersonal",
      "tipoSangre",
    ];
    /* FULL VALIDACIONES */
    // Realiza la validación para cada campo
    const validateTelefono = (telefono) => {
      const telefonoRegex = /^[0-9]+$/;
      return (
        telefono.length >= 10 &&
        telefono.length <= 11 &&
        telefonoRegex.test(telefono)
      );
    };
    for (const campo of camposObligatorios) {
      if (formDatosPersonales[campo].trim() === "") {
        setError(true);
        setErrorMessage("Por favor, completa todos los campos obligatorios");
        setTimeout(() => {
          setError(false);
        }, 3000);

        return;
      }
    }
    /* Validar Cedula */
    if (!validarCedulas(formDatosPersonales.cedula)) {
      setError(true);
      setErrorMessage(
        "Esta cedula ya es de un epleado, por favor ingrese una diferente."
      );
      setTimeout(() => {
        setError(false);
      }, 3000);
      return;
    }

    if (!validateTelefono(formDatosPersonales.cedula)) {
      setError(true);
      setErrorMessage(
        "Igresar una cedula valida, debe contener solo números y tener entre 10 y 11 caracteres. "
      );
      setTimeout(() => {
        setError(false);
      }, 3000);
      return;
    }

    /* validar telefonos */

    /* validacion tlf */
    if (
      !validateTelefono(formDatosPersonales.telefonoTrabajo) &&
      !validateTelefono(formDatosPersonales.telefonoPersonal)
    ) {
      setError(true);
      setErrorMessage(
        "Telefono de trabajo o personal debe contener solo números y tener entre 10 y 11 caracteres."
      );
      setTimeout(() => {
        setError(false);
      }, 3000);
      return;
    }

    handleNext();
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form className="" onSubmit={handleSubmit}>
        {error && (
          <div className="bg-red-500 py-1 px-3 text-white font-bold rounded-md text-center mt-2 mb-5">
            {errorMessage}
          </div>
        )}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          {/* Cedula */}
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

          {/* Correo*/}
          <div className="mb-4">
            <label
              htmlFor="correo"
              className="block text-sm font-medium text-gray-600"
            >
              Correo
            </label>
            <input
              type="email"
              id="correo"
              name="correo"
              onChange={handleChange}
              value={formDatosPersonales.correo}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>
          {/* nombre */}
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
          {/* nombre */}

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
          {/* apellido */}

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
          {/* apellido */}

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
          {/* genero */}

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
          {/* estado civil */}

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
              <option value="divorciado">Divorciado</option>
              <option value="viudo">Viudo</option>
              <option value="otro">Otro</option>
            </select>
          </div>
          {/* telefono */}

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
          {/* telefono */}

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
          {/* sangre */}

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
              <option value="a-">A-</option>
              <option value="b+">B+</option>
              <option value="b-">B-</option>
              <option value="ab+">AB+</option>
              <option value="ab-">AB-</option>
              <option value="o+">O+</option>
              <option value="o-">O-</option>
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
