import React, { useState } from "react";
import useDemografia from "../../../../hooks/useDemografia";

const FormUbicacionDemografia = ({
  handleNext,
  handlePrev,
  setFormDemografia,
  formDemografia,
}) => {
  const { provincias, cantones } = useDemografia();

  const etnias = [
    "Mestizo",
    "Montubio",
    "Afroecuatoriano",
    "Indígena",
    "Blanco",
    "Mulato",
    "Otro",
  ];

  const [provinciaSeleccionada, setProvinciaSeleccionada] = useState("");
  const [cantonesFiltrados, setCantonesFiltrados] = useState([]);

  const handleProvinciaChange = (e) => {
    const provinciaSeleccionada = e.target.value;
    setProvinciaSeleccionada(provinciaSeleccionada);

    // Filtrar cantones por la provincia seleccionada
    const cantonesFiltrados = cantones.filter(
      (canton) => canton.id_provincia === parseInt(provinciaSeleccionada)
    );
    setCantonesFiltrados(cantonesFiltrados);
  };

  console.log(cantones);
  const handleSubmit = (e) => {
    e.preventDefault();
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

    // Llama a la función onNext para pasar al siguiente formulario
    handleNext();
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form onSubmit={handleSubmit}>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          {/* Columna 1 */}
          <div className="mb-4">
            <label
              htmlFor="etnia"
              className="block text-sm font-medium text-gray-600"
            >
              Etnia
            </label>
            <select
              id="etnia"
              name="etnia"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            >
              <option value="" disabled selected>
                Seleccione una etnia
              </option>

              {/* Mapeo de las etnias para crear las opciones del select */}
              {etnias.map((etnia, index) => (
                <option key={index} value={etnia}>
                  {etnia}
                </option>
              ))}
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
              htmlFor="provinciaNacimiento"
              className="block text-sm font-medium text-gray-600"
            >
              Provincia Nacimiento
            </label>
            <select
              id="provinciaNacimiento"
              name="provinciaNacimiento"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={handleProvinciaChange}
            >
              <option value="">Selecciona una provincia</option>
              {provincias.map((provincia) => (
                <option
                  key={provincia.id_provincia}
                  value={provincia.id_provincia}
                >
                  {provincia.nombre_provincia}
                </option>
              ))}
            </select>
          </div>

          <div className="mb-4">
            <label
              htmlFor="cantonNacimiento"
              className="block text-sm font-medium text-gray-600"
            >
              Cantón Nacimiento
            </label>
            <select
              id="cantonNacimiento"
              name="cantonNacimiento"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            >
              <option value="">Selecciona un cantón</option>
              {cantonesFiltrados.map((canton) => (
                <option key={canton.id_canton} value={canton.id_canton}>
                  {canton.nombre_canton}
                </option>
              ))}
            </select>
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
        </div>

        {/* Botón de Siguiente */}
        <div className="col-span-3 flex justify-end">
          <button
            type="button"
            className="bg-yellow-500 text-white py-2 px-5 rounded-lg mr-5"
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
