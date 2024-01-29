import React, { useState } from "react";
import useDirecciones from "../../../../hooks/useDirecciones";

const FormContrato = ({
  handleNext,
  handlePrev,
  formContrato,
  setFormContrato,
}) => {
  const [error, setError] = useState(false);

  const { direcciones, unidades, cargos } = useDirecciones();
  const [unidadesFiltrados, setUnidadesFiltrados] = useState([]);
  const [cargosFiltrados, setCargosFiltrados] = useState([]);

  const handleSubmit = (e) => {
    e.preventDefault();
    const camposObligatorios = [
      "idDireccion",
      "idUnidad",
      "idCargo",
      "fechaInicio",
      "fechaFin",
      "idEmpleado",
      "idTipoContrato",
      "archivo",
      "salario",
      "estadoContrato",
    ];
    for (const campo of camposObligatorios) {
      if (formContrato[campo].trim() === "") {
        setError(true);

        setTimeout(() => {
          setError(false);
        }, 3000);

        return;
      }
    }
    handleNext();
  };

  const hanldeChange = (e) => {
    setFormContrato({
      ...formContrato,
      [e.target.name]: e.target.value,
    });
  };

  const handleDireccionChange = (e) => {
    const idDireccion = e.target.value;

    setFormDemografia({
      ...formDemografia,
      idDireccion: idDireccion,
    });

    // Filtrar cantones por la provincia seleccionada
    const unidadesFilt = unidades.filter(
      (unidad) => unidad.idDireccion === parseInt(formContrato.idDireccion)
    );
    setUnidadesFiltrados(unidadesFilt);
  };

  const handleUnidadnChange = (e) => {
    const idUnidad = e.target.value;

    setFormDemografia({
      ...formDemografia,
      idUnidad: idUnidad,
    });

    // Filtrar cantones por la provincia seleccionada
    const cargosFilt = cargos.filter(
      (cargo) => cargo.idUnidad === parseInt(formContrato.idUnidad)
    );
    setCargosFiltrados(cargosFilt);
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form onSubmit={handleSubmit}>
        {error && (
          <div className="bg-red-500 py-1 px-3 text-white font-bold rounded-md text-center mt-2 mb-5">
            Por favor, completa todos los campos obligatorios.
          </div>
        )}
        {/* Columna 1 */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          {/* Direccion */}
          <div className="mb-4">
            <label
              htmlFor="direccion"
              className="block text-sm font-medium text-gray-600"
            >
              Dirección
            </label>
            <select
              id="direccion"
              name="idDireccion"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={hanldeChange}
              value={formContrato.idDireccion}
            >
              {direcciones.map((direccion) => (
                <option
                  key={direccion.idDireccion}
                  value={direccion.idDireccion}
                >
                  {direccion.nombre}
                </option>
              ))}
            </select>
          </div>
          {/* Unidad */}
          <div className="mb-4">
            <label
              htmlFor="unidad"
              className="block text-sm font-medium text-gray-600"
            >
              Unidad
            </label>
            <select
              id="unidad"
              name="idUnidad"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={hanldeChange}
              value={formContrato.idUnidad}
            >
              <option value="">Selecciona una Unidad</option>
              {unidadesFiltrados.map((unidad) => (
                <option key={unidad.idUnidad} value={unidad.idUnidad}>
                  {unidad.nombre}
                </option>
              ))}
            </select>
          </div>
          {/* Cargo */}
          <div className="mb-4">
            <label
              htmlFor="cargo"
              className="block text-sm font-medium text-gray-600"
            >
              Cargo
            </label>
            <select
              id="idCargo"
              name="cargo"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={hanldeChange}
              value={formContrato.idCargo}
            >
              {/* Opciones para cargo */}
            </select>
          </div>

          {/* TipoContrato */}
          <div className="mb-4">
            <label
              htmlFor="tipoContrato"
              className="block text-sm font-medium text-gray-600"
            >
              Tipo de Contrato
            </label>
            <select
              id="tipoContrato"
              name="idTipoContrato"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={hanldeChange}
              value={formContrato.idTipoContrato}
            >
              {/* Opciones para tipoContrato */}
            </select>
          </div>
          {/* Fecha Inicial contrato */}

          <div className="mb-4">
            <label
              htmlFor="fechaInicioContrato"
              className="block text-sm font-medium text-gray-600"
            >
              Fecha de Inicio del Contrato
            </label>
            <input
              type="date"
              id="fechaInicio"
              name="fechaInicio"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={hanldeChange}
              value={formContrato.fechaInicio}
            />
          </div>
          {/* Fecha Final contrato */}

          <div className="mb-4">
            <label
              htmlFor="fechaFinContrato"
              className="block text-sm font-medium text-gray-600"
            >
              Fecha de Fin del Contrato
            </label>
            <input
              type="date"
              id="fechaFin"
              name="fechaFin"
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              onChange={hanldeChange}
              value={formContrato.fechaFin}
            />
          </div>

          {/* salario */}
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
              onChange={hanldeChange}
              value={formContrato.salario}
            />
          </div>
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
