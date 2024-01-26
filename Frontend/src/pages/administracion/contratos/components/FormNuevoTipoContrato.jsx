import React, { useState } from "react";

const FormularioContrato = () => {
  const [formData, setFormData] = useState({
    nombre: "",
    descripcion: "",
    clausulas: "",
    duracionMeses: "",
  });

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log("Datos del formulario:", formData);
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form onSubmit={handleSubmit} className="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div className="mb-4">
          <label htmlFor="nombre" className="block text-sm font-medium text-gray-600">
            Nombre
          </label>
          <input
            type="text"
            id="nombre"
            name="nombre"
            value={formData.nombre}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label htmlFor="descripcion" className="block text-sm font-medium text-gray-600">
            Descripción
          </label>
          <textarea
            id="descripcion"
            name="descripcion"
            value={formData.descripcion}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          ></textarea>
        </div>

        <div className="mb-4">
          <label htmlFor="clausulas" className="block text-sm font-medium text-gray-600">
            Clausulas
          </label>
          <textarea
            id="clausulas"
            name="clausulas"
            value={formData.clausulas}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          ></textarea>
        </div>

        <div className="mb-4">
          <label htmlFor="duracionMeses" className="block text-sm font-medium text-gray-600">
            Duración en Meses
          </label>
          <input
            type="number"
            id="duracionMeses"
            name="duracionMeses"
            value={formData.duracionMeses}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
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
