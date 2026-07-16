import React, { useState } from "react";

const FormularioCalendarioMensual = () => {
  const [form, setForm] = useState({
    fechaInicio: "",
    fechaFin: "",
  });

  const [error, setError] = useState(false);
  const [errorMensaje, setErrorMensaje] = useState(null);

  const handleChange = (e) => {
    setForm({
      ...form,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    // Verificar que todos los campos estén llenos
    if (!form.fechaInicio || !form.fechaFin) {
      setError(true);
      setErrorMensaje("Por favor, complete todos los campos.");
      return;
    }

    // Verificar que la fecha de inicio sea menor que la fecha de fin
    if (new Date(form.fechaInicio) >= new Date(form.fechaFin)) {
      setError(true);
      setErrorMensaje(
        "La fecha de inicio debe ser anterior a la fecha de fin."
      );
      return;
    }

    try {
      // Realizar la solicitud HTTP para guardar los datos
      const response = await fetch(
        "http://localhost:8000/api/registrarActividadesMesesAuto",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(form),
        }
      );
      if (!response.ok) {
        throw new Error("Error al registrar actividades.");
      }
      // Reiniciar estado de error y limpiar el formulario
      setError(false);
      setErrorMensaje(null);
      setForm({
        fechaInicio: "",
        fechaFin: "",
        descripcionActividad: "",
      });
      console.log("Actividades registradas correctamente.");
    } catch (error) {
      console.error("Error al registrar actividades:", error);
      // Manejar el error de manera adecuada (por ejemplo, mostrar un mensaje al usuario)
    }
  };

  return (
    <>
      <div className="max-w-screen-md mx-auto p-4">
        <p className="text-gray-600 text-sm mb-10">
          Este Registro creara un calendario de actividades automatico Lunes a
          Viernes son asigandos como dias normales laborales Fines de semana
          tienen otro tipo de actividades Las actividades pueden ser modificadas
        </p>

        <form className="" onSubmit={handleSubmit}>
          {error && (
            <div className="bg-red-500 py-1 px-3 text-white font-bold rounded-md text-center mt-2 mb-5">
              {errorMensaje}
            </div>
          )}
          <div className="grid grid-cols-1  gap-4">
            {/* Fecha Inicio */}
            <div className="mb-4">
              <label
                htmlFor="fechaInicio"
                className="block text-sm font-medium text-gray-600"
              >
                Fecha Inicio
              </label>
              <input
                type="date"
                id="fechaInicio"
                name="fechaInicio"
                onChange={handleChange}
                value={form.fechaInicio}
                className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              />
            </div>

            {/* Fecha Fin */}
            <div className="mb-4">
              <label
                htmlFor="fechaFin"
                className="block text-sm font-medium text-gray-600"
              >
                Fecha Fin
              </label>
              <input
                type="date"
                id="fechaFin"
                name="fechaFin"
                onChange={handleChange}
                value={form.fechaFin}
                className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              />
            </div>
          </div>
          {/* Botón de Siguiente */}
          <div className="col-span-3 flex justify-end">
            <button
              type="submit"
              className="bg-blue-700 text-white py-2 px-5 rounded-lg"
            >
              Registrar
            </button>
          </div>
        </form>
      </div>
    </>
  );
};

export default FormularioCalendarioMensual;
