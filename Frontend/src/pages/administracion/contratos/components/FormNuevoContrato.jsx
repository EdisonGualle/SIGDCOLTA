import React, { useState, useEffect } from "react";
import axios from 'axios';
import Swal from 'sweetalert2';

const FormularioContrato = ({ selectedEmployeeId, selectedEmployeeName, ContratoTipo }) => {
  const [formData, setFormData] = useState({
    fechaInicio: "",
    fechaFin: "",
    idEmpleado: selectedEmployeeId || "",
    nombreEmpleado: selectedEmployeeName || "",
    idTipoContrato: "",
    archivo: null,
    salario: "",
    estadoContrato: "Activo", // Estado predeterminado
  });


  const [error, setError] = useState(false);
  const [errorMessage, setErrorMessage] = useState(null);
  const [routeMessage, setRouteMessage] = useState("");
  const [tiposContratoR, setTiposContrato] = useState([]); // Estado para almacenar los tipos de contrato

  useEffect(() => {
    const fetchTiposContrato = async () => {
      try {
        const token = localStorage.getItem('token'); // Obtener el token del localStorage
        const response = await axios.get("http://127.0.0.1:8000/api/administrador/tipos-contrato", {
          headers: {
            Authorization: `Bearer ${token}` // Incluir el token en la cabecera de la solicitud
          }
        });
        setTiposContrato(response.data.data);
        // Almacenar los tipos de contrato en el estado local
      } catch (error) {
        console.error("Error al obtener tipos de contrato:", error);
      }
    };

    fetchTiposContrato();
  }, []);

  const handleChange = (e) => {
    const { name, value, type, files } = e.target;
    setFormData({
      ...formData,
      [name]: type === "file" ? files[0] : value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
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
        "http://127.0.0.1:8000/api/contratos",
        formData
      );
      if (response.status === 200) {

      }
      Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: 'El Contrato se ha creado correctamente',
      }).then((result) => {
        if (result.isConfirmed || result.isDismissed) {
          // window.location.reload(); // Recargar la página
        }
      });
    } catch (error) {
      console.error("Error al crear el Contrato", error);
      console.log(
        "Detalles del error:",
        error.response?.data || "No hay detalles disponibles"
      );
      // Crear un array para almacenar los mensajes de error
      let errorMessages = [];
      // Iterar sobre las claves de error y obtener los mensajes de error
      for (const key in error.response.data.errors) {
        if (Object.hasOwnProperty.call(error.response.data.errors, key)) {
          const errorMessage = error.response.data.errors[key][0];
          errorMessages.push(errorMessage);
        }
      }
      console.log("Respuesta del servidor:", error.response.data);
      // Mostrar el mensaje de error en SweetAlert
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: `Error: ${errorMessages.join("\n")}`, // Unir los mensajes de error con saltos de línea

      });

    }
  }

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form onSubmit={handleSubmit}>
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
            <label htmlFor="nombreEmpleado" className="block text-sm font-medium text-gray-600">
              Empleado
            </label>
            <input
              type="text"
              id="nombreEmpleado"
              name="nombreEmpleado"
              value={formData.nombreEmpleado}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              disabled // Deshabilita la entrada para que no sea modificable manualmente
            />
          </div>
          <div className="mb-4">
            <label htmlFor="fechaInicio" className="block text-sm font-medium text-gray-600">
              Fecha de Inicio
            </label>
            <input
              type="date"
              id="fechaInicio"
              name="fechaInicio"
              value={formData.fechaInicio}
              onChange={handleChange}
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
              onChange={handleChange}
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
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              disabled // Deshabilita la entrada para que no sea modificable manualmente
            />


          </div>



          <div className="mb-4">
            <label htmlFor="idTipoContrato" className="block text-sm font-medium text-gray-600">
              Tipo de Contrato
            </label>

            <select
            type="number"
              id="idTipoContrato"
              name="idTipoContrato"
              value={formData.idTipoContrato}
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            >
              {tiposContratoR.map(elemento => (
                <option key={elemento.idTipoContrato} value={elemento.idTipoContrato}>{elemento.nombre}</option>
              ))}
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
              onChange={handleChange}
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
              onChange={handleChange}
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
              onChange={handleChange}
              className="mt-1 p-2 w-full border border-gray-300 rounded-md"
              disabled // Deshabilita el desplegable
            >
              <option value="Activo">Activo</option>
            </select>
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
