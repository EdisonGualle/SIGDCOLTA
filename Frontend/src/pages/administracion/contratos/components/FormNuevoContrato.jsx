import React, { useState } from "react";

const FormularioContrato = ({ tipoContratos, selectedEmployeeId, selectedEmployeeName }) => {
  const [formData, setFormData] = useState({
    fechaInicio: "",
    fechaFin: "",
    idEmpleado: selectedEmployeeId || "",
    nombreEmpleado: selectedEmployeeName || "", // Nuevo campo para el nombre completo
    idTipoContrato: "",
    archivo: null,
    salario: "",
    estadoContrato: "",
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
          <label htmlFor="fechaInicio" className="block text-sm font-medium text-gray-600">
            Fecha de Inicio
          </label>
          <input
            type="date"
            id="fechaInicio"
            name="fechaInicio"
            value={formData.fechaInicio}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label htmlFor="fechaFin" className="block text-sm font-medium text-gray-600">
            Fecha de Fin
          </label>
          <input
            type="date"
            id="fechaFin"
            name="fechaFin"
            value={formData.fechaFin}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label htmlFor="idEmpleado" className="block text-sm font-medium text-gray-600">
            ID de Empleado
          </label>
          <input
            type="text"
            id="idEmpleado"
            name="idEmpleado"
            value={formData.idEmpleado}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            disabled // Deshabilita la entrada para que no sea modificable manualmente
          />

        </div>
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
            disabled // Deshabilita la entrada para que no sea modificable manualmente
          />
        </div>

        <div className="mb-4">
          <label
            htmlFor="descripcion"
            className="block text-sm font-medium text-gray-600"
          >
            Tipos de Contratos
          </label>
          <select
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            name="tiposContratos"
            id="tiposContratos"
            defaultValue={undefined}
          >
            <option value="" hidden>
              Tipos de Contratos
            </option>
            {tipoContratos && tipoContratos.map((tipoContrato) => {
              return (
                <option key={tipoContrato.idTipoContrato} value={tipoContrato.idTipoContrato}>
                  {tipoContrato.nombre}
                </option>
              );
            })}



          </select>
        </div>

        <div className="mb-4">
          <label htmlFor="archivo" className="block text-sm font-medium text-gray-600">
            Archivo
          </label>
          <input
            type="file"
            id="archivo"
            name="archivo"
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label htmlFor="salario" className="block text-sm font-medium text-gray-600">
            Salario
          </label>
          <input
            type="number"
            id="salario"
            name="salario"
            value={formData.salario}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label htmlFor="estadoContrato" className="block text-sm font-medium text-gray-600">
            Estado de Contrato
          </label>
          <select
            id="estadoContrato"
            name="estadoContrato"
            value={formData.estadoContrato}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            disabled // Deshabilita el desplegable
          >
            <option value="Activo">Activo</option>
          </select>
        </div>
      </form>

    </div>
  );
};

export default FormularioContrato;
