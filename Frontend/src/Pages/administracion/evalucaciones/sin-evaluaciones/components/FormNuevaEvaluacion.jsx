import React, { useState } from "react";

const FormularioEvaluacion = ({ selectedEmployeeId, selectedEmployeeName }) => {
  // Obtiene la fecha actual
  const currentDate = new Date().toISOString().split('T')[0];
  const [formData, setFormData] = useState({
    idEmpleado: selectedEmployeeId || "",
    nombreEmpleado: selectedEmployeeName || "",
    idEvaluador: "",
    fechaEvaluacion: currentDate, // Establece la fecha actual por defecto
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


  const handleInputChange = (e) => {
    const { name, value, type, files } = e.target;
    setFormData({
      ...formData,
      [name]: type === "file" ? files[0] : value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log("Datos del formulario:", formData);
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form onSubmit={handleSubmit} className="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div className="mb-4">
          <label htmlFor="nombreEmpleado" className="block text-sm font-medium text-gray-600">
            Empleado
          </label>
          <input
            type="text"
            id="nombreEmpleado"
            name="nombreEmpleado"
            value={formData.nombreEmpleado}
            onChange={handleInputChange}
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
            onChange={handleInputChange}
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
            onChange={handleInputChange}
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
            onChange={handleInputChange}
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
            onChange={handleInputChange}
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
            onChange={handleInputChange}
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
            onChange={handleInputChange}
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
            onChange={handleInputChange}
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
            onChange={handleInputChange}
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
            onChange={handleInputChange}
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
            onChange={handleInputChange}
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
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label htmlFor="estadoEvaluacion" className="block text-sm font-medium text-gray-600">
            Estado de la Evaluación
          </label>
          <input
            type="text"
            id="estadoEvaluacion"
            name="estadoEvaluacion"
            value={formData.estadoEvaluacion}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label htmlFor="archivo" className="block text-sm font-medium text-gray-600">
            Archivo (opcional)
          </label>
          <input
            type="file"
            id="archivo"
            name="archivo"
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

      </form>
    </div>
  );
};

export default FormularioEvaluacion;
