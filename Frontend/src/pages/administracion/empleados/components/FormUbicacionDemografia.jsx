import React, { useState } from "react";
import useDemografia from "../../../../hooks/useDemografia";

const FormUbicacionDemografia = ({ 
  handleNext,
  handlePrev,
  setFormDemografia,
  formDemografia,
}) => {
  const { provincias, cantones } = useDemografia();
  const [error, setError] = useState(false);
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
  const handleChange = (e) => {
    setFormDemografia({
      ...formDemografia,
      [e.target.name]: e.target.value,
    });
  };
  const handleProvinciaChange = (e) => {
    const provinciaSeleccionada = e.target.value;
    setProvinciaSeleccionada(provinciaSeleccionada);
    setFormDemografia({
      ...formDemografia,
      id_provincia: provinciaSeleccionada,
    });

    // Filtrar cantones por la provincia seleccionada
    const cantonesFiltrados = cantones.filter(
      (canton) => canton.id_provincia === parseInt(provinciaSeleccionada)
    );
    setCantonesFiltrados(cantonesFiltrados);
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    const camposObligatorios = [
      "etnia",
      "nacionalidad",
      "fechaNacimiento",
      "id_provincia",
      "id_canton",
      "fechaNacimiento",
    ];

    /* for (const campo of camposObligatorios) {
      if (formDemografia[campo].trim() === "") {
        setError(true);

        setTimeout(() => {
          setError(false);
        }, 3000);

        return;
      }
    } */
    // Llama a la función onNext para pasar al siguiente formulario
    handleNext();
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form onSubmit={handleSubmit}>
        {error && (
          <div className="bg-red-500 py-1 px-3 text-white font-bold rounded-md text-center mt-2 mb-5">
            Por favor, completa todos los campos obligatorios.
          </div>
        )}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          {/* Etnia */}
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
              value={formDemografia.etnia}
              onChange={handleChange}
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

          {/* Nacionalidad */}
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
              value={formDemografia.nacionalidad}
              onChange={handleChange}
            />
          </div>

          {/* Provincia */}
          <div className="mb-4">
            <label
              htmlFor="provinciaNacimiento"
              className="block text-sm font-medium text-gray-600"
            >
              Provincia Nacimiento
            </label>
            <select
              id="provinciaNacimiento"
              name="id_provincia"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={handleProvinciaChange}
              value={formDemografia.id_provincia}
            >
              <option value={""} >Selecciona una provincia</option>
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

          {/* Canton */}
          <div className="mb-4">
            <label
              htmlFor="cantonNacimiento"
              className="block text-sm font-medium text-gray-600"
            >
              Cantón Nacimiento
            </label>
            <select
              id="cantonNacimiento"
              name="id_canton"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              value={formDemografia.id_canton}
              onChange={handleChange}
            >
              <option value={""} >Selecciona un cantón</option>
              {cantonesFiltrados.map((canton) => (
                <option key={canton.id_canton} value={canton.id_canton}>
                  {canton.nombre_canton}
                </option>
              ))}
            </select>
          </div>

          {/* FechaNacimiento */}
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
              value={formDemografia.fechaNacimiento}
              onChange={handleChange}
            />
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
