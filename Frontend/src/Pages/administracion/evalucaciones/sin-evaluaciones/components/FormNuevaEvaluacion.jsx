import React, { useState } from "react";
import useEvaluaciones from "../../../../../hooks/useEvaluaciones";


const FormularioEvaluacion = ({ selectedEmployeeId, selectedEmployeeName,  }) => {
  const [formData, setFormData] = useState({
    idEmpleado: selectedEmployeeId || "",
    nombreEmpleado: selectedEmployeeName || "",
    idEvaluador: "",
    fechaEvaluacion: new Date().toISOString().split('T')[0],
    ObjetivosMetas: "",
    cumplimientoObjetivos: "",
    competencias: "",
    calificacionGeneral: "",
    comentarios: "",
    areasMejora: "",
    reconocimientosLogros: "",
    desarrolloProfesional: "",
    feedbackEmpleado: "",
    estadoEvaluacion: "",
    archivo: null,
  });
  const [error, setError] = useState(false);
  const [errorMessage, setErrorMessage] = useState(null);

  const handleChange = (e) => {
    const { name, value, type, files } = e.target;
    setFormData({
      ...formData,
      [name]: type === "file" ? files[0] : value,
    });
  };



  const handleSubmit = async (e) => {
    e.preventDefault();

    // Validación de campos obligatorios
    const camposObligatorios = [
      "idEmpleado",
      "nombreEmpleado",
      "idEvaluador",
      "fechaEvaluacion",
      "ObjetivosMetas",
      "cumplimientoObjetivos",
      "competencias",
      "calificacionGeneral",
      "comentarios",
      "areasMejora",
      "reconocimientosLogros",
      "desarrolloProfesional",
      "feedbackEmpleado",
      "estadoEvaluacion",
    ];

    for (const campo of camposObligatorios) {
      const valorCampo = formData[campo];
      if (typeof valorCampo === 'string' && valorCampo.trim() === "") {
        setError(true);
        setErrorMessage("Por favor, completa todos los campos obligatorios");
        setTimeout(() => {
          setError(false);
          setErrorMessage("");
        }, 3000);
        return;
      }
    }

    // Si todos los campos obligatorios están completos, llamamos a agregarEvaluacion
    try {
      await agregarEvaluacion(formData);
      // Manejar éxito, por ejemplo, redirigir a una página de éxito
    } catch (error) {
      // Manejar error, mostrar mensaje al usuario o realizar otra acción
    }
  };



  // const { alerta } = useEvaluaciones();

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form className="" onSubmit={handleSubmit}>
        {error && (
          <div className="bg-red-500 py-1 px-3 text-white font-bold rounded-md text-center mt-2 mb-5">
            Por favor, completa todos los campos obligatorios.
          </div>
        )}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <div className="mb-4">
            <label htmlFor="idEmpleado" className="block text-sm font-medium text-gray-600">
              Empleado
            </label>
            <input
              type="text"
              id="idEmpleado"
              name="idEmpleado"
              value={formData.idEmpleado}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              disabled
            />
          </div>
          <div className="mb-4">
            <label htmlFor="idEvaluador" className="block text-sm font-medium text-gray-600">
              Evaluador
            </label>
            <input
              type="text"
              id="idEvaluador"
              name="idEvaluador"
              value={formData.idEvaluador}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>
          <div className="mb-4">
            <label htmlFor="fechaEvaluacion" className="block text-sm font-medium text-gray-600">
              Fecha de Evaluación
            </label>
            <input
              type="date"
              id="fechaEvaluacion"
              name="fechaEvaluacion"
              value={formData.fechaEvaluacion}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="ObjetivosMetas" className="block text-sm font-medium text-gray-600">
              Objetivos y Metas
            </label>
            <input
              type="text"
              id="ObjetivosMetas"
              name="ObjetivosMetas"
              value={formData.ObjetivosMetas}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="cumplimientoObjetivos" className="block text-sm font-medium text-gray-600">
              Cumplimiento de Objetivos (%)
            </label>
            <input
              type="number"
              id="cumplimientoObjetivos"
              name="cumplimientoObjetivos"
              value={formData.cumplimientoObjetivos}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="competencias" className="block text-sm font-medium text-gray-600">
              Competencias
            </label>
            <input
              type="text"
              id="competencias"
              name="competencias"
              value={formData.competencias}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="calificacionGeneral" className="block text-sm font-medium text-gray-600">
              Calificación General (%)
            </label>
            <input
              type="number"
              id="calificacionGeneral"
              name="calificacionGeneral"
              value={formData.calificacionGeneral}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="comentarios" className="block text-sm font-medium text-gray-600">
              Comentarios
            </label>
            <textarea
              id="comentarios"
              name="comentarios"
              value={formData.comentarios}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="areasMejora" className="block text-sm font-medium text-gray-600">
              Áreas de Mejora
            </label>
            <textarea
              id="areasMejora"
              name="areasMejora"
              value={formData.areasMejora}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="reconocimientosLogros" className="block text-sm font-medium text-gray-600">
              Reconocimientos y Logros
            </label>
            <textarea
              id="reconocimientosLogros"
              name="reconocimientosLogros"
              value={formData.reconocimientosLogros}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="desarrolloProfesional" className="block text-sm font-medium text-gray-600">
              Desarrollo Profesional
            </label>
            <textarea
              id="desarrolloProfesional"
              name="desarrolloProfesional"
              value={formData.desarrolloProfesional}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="feedbackEmpleado" className="block text-sm font-medium text-gray-600">
              Feedback del Empleado
            </label>
            <textarea
              id="feedbackEmpleado"
              name="feedbackEmpleado"
              value={formData.feedbackEmpleado}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="estadoEvaluacion" className="block text-sm font-medium text-gray-600">
              Estado de la Evaluación
            </label>
            <select
              id="estadoEvaluacion"
              name="estadoEvaluacion"
              value={formData.estadoEvaluacion}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            >
              <option value="">Selecciona una opción</option>
              <option value="Aprobada">Aprobada</option>
              <option value="Rechazada">Rechazada</option>
            </select>
          </div>


          <div className="mb-4">
            <label htmlFor="archivo" className="block text-sm font-medium text-gray-600">
              Archivo (opcional)
            </label>
            <input
              type="file"
              id="archivo"
              name="archivo"
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />

          </div>


        </div>

        <button
          type="submit"
          className="bg-blue-700 text-white py-2 px-5 rounded-lg"
        >
          GUARDAR
        </button>

      </form>
      {/* {alerta.error ? (
          <p className="text-red-500">{alerta.mensaje}</p>
        ) : (
          <p className="text-center font-bold text-green-500">{alerta.mensaje}</p>
        )} */}
    </div>
  );
};
export default FormularioEvaluacion;
