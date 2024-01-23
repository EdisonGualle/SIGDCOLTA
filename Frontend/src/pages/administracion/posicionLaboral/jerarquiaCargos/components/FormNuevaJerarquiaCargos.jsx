import React, { useState, useEffect } from "react";

const FormNuevaJerarquiaCargos = ({ unidades, cargos }) => {
  const [selectedDireccion, setSelectedDireccion] = useState("");
  const [selectedUnidad, setSelectedUnidad] = useState("");
  const [filteredUnidades, setFilteredUnidades] = useState([]);
  const [filteredCargos, setFilteredCargos] = useState([]);

  useEffect(() => {
    // Inicializa las unidades filtradas con todas las unidades
    setFilteredUnidades(unidades);
    // Vacía los cargos al cambiar de dirección
    setFilteredCargos([]);
  }, [unidades]);

  useEffect(() => {
    // Filtra las unidades basadas en la dirección seleccionada
    if (selectedDireccion) {
      const unidadesFiltradas = unidades.filter(
        (unidad) => unidad.direccion.nombre === selectedDireccion
      );
      setFilteredUnidades(unidadesFiltradas);
      // Vacía los cargos al cambiar de dirección
      setFilteredCargos([]);
    } else {
      // Si no hay dirección seleccionada, muestra todas las unidades
      setFilteredUnidades(unidades);
    }
  }, [selectedDireccion, unidades]);

  const handleUnidadChange = (e) => {
    // Actualiza el estado de la unidad seleccionada
    setSelectedUnidad(e.target.value);

    // Filtra los cargos basados en la unidad seleccionada
    const cargosFiltrados = cargos.filter(
      (cargo) => cargo.unidad.idUnidad === parseInt(e.target.value)
    );
    setFilteredCargos(cargosFiltrados);
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div className="mb-4">
          <label
            htmlFor="nombreDireccion"
            className="block text-sm font-medium text-gray-600"
          >
            Dirección
          </label>
          <select
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            name="direcciones"
            id="direcciones"
            onChange={(e) => setSelectedDireccion(e.target.value)}
            value={selectedDireccion || ""}
          >
            <option value="" hidden>
              Seleccionar Dirección
            </option>
            {/* Mostrar todas las direcciones */}
            {Array.from(new Set(unidades.map((unidad) => unidad.direccion.nombre))).map(
              (nombreDireccion) => (
                <option key={nombreDireccion} value={nombreDireccion}>
                  {nombreDireccion}
                </option>
              )
            )}
          </select>
        </div>
        <div className="mb-4">
          <label
            htmlFor="nombreUnidad"
            className="block text-sm font-medium text-gray-600"
          >
            Unidad
          </label>
          <select
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            name="unidadPerteneciente"
            id="unidadPerteneciente"
            value={selectedUnidad}
            onChange={handleUnidadChange}
          >
            <option value="" hidden>
              Seleccionar Unidad
            </option>
            {/* Mostrar las unidades filtradas */}
            {filteredUnidades.map((unidad) => (
              <option key={unidad.idUnidad} value={unidad.idUnidad}>
                {unidad.nombre}
              </option>
            ))}
          </select>
        </div>
        <div className="mb-4">
          <label
            htmlFor="nombreCargo"
            className="block text-sm font-medium text-gray-600"
          >
            Cargo
          </label>
          <select
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            name="unidadPerteneciente"
            id="unidadPerteneciente"
            defaultValue={undefined}
          >
            <option value="" hidden>
              Seleccionar Cargo
            </option>
            {/* Mostrar los cargos filtrados por la unidad seleccionada */}
            {filteredCargos.map((cargo) => (
              <option key={cargo.idCargo} value={cargo.idCargo}>
                {cargo.nombre}
              </option>
            ))}
          </select>
        </div>
        <div className="mb-4">
          <label
            htmlFor="nombreCargo"
            className="block text-sm font-medium text-gray-600"
          >
            Cargo Aprobador
          </label>
          <select
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            name="unidadPerteneciente"
            id="unidadPerteneciente"
            defaultValue={undefined}
          >
            <option value="" hidden>
              Seleccionar Cargo
            </option>
            {/* Mostrar los cargos filtrados por la unidad seleccionada */}
            {filteredCargos.map((cargo) => (
              <option key={cargo.idCargo} value={cargo.idCargo}>
                {cargo.nombre}
              </option>
            ))}
          </select>
        </div>
      </form>
    </div>
  );
};

export default FormNuevaJerarquiaCargos;
