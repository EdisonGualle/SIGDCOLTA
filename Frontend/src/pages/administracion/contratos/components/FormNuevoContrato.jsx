import React, { useState } from "react";

const FormularioContrato = ({ selectedRowData }) => {
  const [formData, setFormData] = useState({
    fechaInicio: "",
    fechaFin: "",
    idEmpleado: "",
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
          />
        </div>

        <div className="mb-4">
          <label htmlFor="idTipoContrato" className="block text-sm font-medium text-gray-600">
            ID de Tipo de Contrato
          </label>
          <input
            type="text"
            id="idTipoContrato"
            name="idTipoContrato"
            value={formData.idTipoContrato}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
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
      <button
          type="submit"
          className="bg-blue-700 text-white py-2 px-5 rounded-lg"
        >
          Crear Contrato
        </button>
    </div>
  );
};

export default FormularioContrato;
