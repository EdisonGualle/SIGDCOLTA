import React, { useState, useEffect } from "react";

const FormAsignarCapacitacion = () => {
  const [selectedEmpleado, setSelectedEmpleado] = useState("");
  const [colaboradores, setColaboradores] = useState([]);
  const [capacitaciones, setCapacitaciones] = useState([]);
  const [selectedCapacitacion, setSelectedCapacitacion] = useState("");

  useEffect(() => {
    // Obtener lista de empleados desde el backend
    fetch("http://127.0.0.1:8000/api/empleados")
      .then((response) => response.json())
      .then((data) => setColaboradores(data.data))
      .catch((error) => console.error("Error al obtener empleados:", error));

    // Obtener lista de capacitaciones desde el backend
    fetch("http://127.0.0.1:8000/api/capacitaciones")
      .then((response) => response.json())
      .then((data) => setCapacitaciones(data.data))
      .catch((error) => console.error("Error al obtener capacitaciones:", error));
  }, []);

  const handleEmpleadoChange = (e) => {
    setSelectedEmpleado(e.target.value);
  };

  const handleCapacitacionChange = (e) => {
    setSelectedCapacitacion(e.target.value);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch("http://127.0.0.1:8000/api/asignar-capacitacion", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          idEmpleado: selectedEmpleado,
          idCapacitacion: selectedCapacitacion,
        }),
      });

      const responseData = await response.json();

      // Aquí puedes manejar la respuesta del backend, mostrar mensajes al usuario, etc.
      console.log("Respuesta del backend:", responseData);
    } catch (error) {
      console.error("Error al asignar capacitación:", error);
    }
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form onSubmit={handleSubmit} className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {/* ... (otros campos del formulario) */}

        {/* Columna 3 */}
        <div className="mb-4">
          <label htmlFor="empleado" className="block text-sm font-medium text-gray-600">
            Seleccionar Empleado
          </label>
          <select
            id="empleado"
            name="empleado"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            onChange={handleEmpleadoChange}
            value={selectedEmpleado}
          >
            <option value="" disabled>
              Seleccione un empleado
            </option>
            {colaboradores.map((empleado) => (
              <option key={empleado.idEmpleado} value={empleado.idEmpleado}>
                {empleado.primerNombre} {empleado.segundoNombre} {empleado.primerApellido} {empleado.segundoApellido}
              </option>
            ))}
          </select>
        </div>

        {/* Corregir el nombre del campo a idCapacitacion */}
        <div className="mb-4">
          <label htmlFor="capacitacion" className="block text-sm font-medium text-gray-600">
            Seleccionar Capacitación
          </label>
          <select
            id="capacitacion"
            name="capacitacion"
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            onChange={handleCapacitacionChange}
            value={selectedCapacitacion}
          >
            <option value="" disabled>
              Seleccione una capacitación
            </option>
            {capacitaciones.map((capacitacion) => (
              <option key={capacitacion.idCapacitacion} value={capacitacion.idCapacitacion}>
                {capacitacion.nombre}
              </option>
            ))}
          </select>
        </div>

        <div className="col-span-2">
          <button
            type="submit"
            className="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"
          >
            Asignar Capacitación
          </button>
        </div>
      </form>
    </div>
  );
};

export default FormAsignarCapacitacion;
