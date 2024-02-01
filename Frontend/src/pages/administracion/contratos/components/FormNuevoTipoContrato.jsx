import React, { useState } from "react";
import axios from 'axios';
// import { useHistory } from 'react-router-dom';
import Swal from 'sweetalert2';

const FormularioContrato = () => {
  const [formData, setFormData] = useState({
    nombre: "",
    descripcion: "",
    clausulas: "",
    duracionMeses: "",
  });
  const [error, setError] = useState(false);
  const [errorMessage, setErrorMessage] = useState(null);
  const [routeMessage, setRouteMessage] = useState("")

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
    if (Object.values(formData).some(value => typeof value === 'string' && value.trim() === '')) {
      setError(true);
      setErrorMessage("Por favor, completa todos los campos obligatorios");
      setTimeout(() => {
        setError(false);
        setErrorMessage("");
      }, 3000);
      return;
    }

    try {
      const response = await axios.post(
        "http://127.0.0.1:8000/api/tipos-contrato",
        formData
      );
      if (response.status === 200) {

      }
      Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: 'El Tipo de Contrato se ha creado correctamente',
      }).then((result) => {
        if (result.isConfirmed || result.isDismissed) {
          window.location.reload(); // Recargar la página
        }
      });

    } catch (error) {
      console.error("Error al crear El tipo de Contrato", error);
      console.log(
        "Detalles del error:",
        error.response?.data || "No hay detalles disponibles"
      );
      console.log("Respuesta del servidor:", error.response.data);
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: `Detalles del error: ${error.response.data.errors.nombre[0]}`,
      });
      
    }
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form onSubmit={handleSubmit} >
        {error && (
          <div className="bg-red-500 py-1 px-3 text-white font-bold rounded-md text-center mt-2 mb-5">
            Por favor, completa todos los campos obligatorios.
          </div>
        )}
        {routeMessage && (
          <div className="bg-yellow-500 py-1 px-3 text-white font-bold rounded-md text-center mt-2 mb-5">
            {routeMessage}
          </div>
        )}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <div className="mb-4">
            <label htmlFor="nombre" className="block text-sm font-medium text-gray-600">
              Nombre
            </label>
            <input
              type="text"
              id="nombre"
              name="nombre"
              value={formData.nombre}
              onChange={handleChange}
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
              onChange={handleChange}
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
              onChange={handleChange}
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
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            />
          </div>
        </div>
        <button
          type="submit"
          className="bg-blue-700 text-white py-2 px-5 rounded-lg"
        >
          Crear Contrato
        </button>
      </form>

    </div>
  );
};

export default FormularioContrato;
