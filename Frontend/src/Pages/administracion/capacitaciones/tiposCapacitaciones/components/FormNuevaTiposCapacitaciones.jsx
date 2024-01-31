// import React, { useState } from "react";
// import axios from 'axios';
// // import { useHistory } from 'react-router-dom';
// import Swal from 'sweetalert2';

// const FormNuevaTiposCapacitaciones = () => {
//   return (
//     <div className="max-w-screen-md mx-auto p-4">
//       <form className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
//         {/* Columna 1 */}
//         <div className="mb-4">
//           <label htmlFor="nombre" className="block text-sm font-medium text-gray-600">
//             Nombre
//           </label>
//           <input
//             type="text"
//             id="nombre"
//             name="nombre"
//             className="mt-1 p-2 w-full border border-gray-300 rounded-md"
//           />
//         </div>

//         <div className="mb-4">
//           <label htmlFor="descripcion" className="block text-sm font-medium text-gray-600">
//             Descripción
//           </label>
//           <textarea
//             id="descripcion"
//             name="descripcion"
//             className="mt-1 p-2 w-full border border-gray-300 rounded-md"
//           ></textarea>
//         </div>

//         <div className="mb-4">
//           <label htmlFor="tipoEvento" className="block text-sm font-medium text-gray-600">
//             Tipo de Evento
//           </label>
//           <input
//             type="text"
//             id="tipoEvento"
//             name="tipoEvento"
//             className="mt-1 p-2 w-full border border-gray-300 rounded-md"
//           />
//         </div>

//         {/* Columna 2 */}
//         <div className="mb-4">
//           <label htmlFor="institucion" className="block text-sm font-medium text-gray-600">
//             Institución
//           </label>
//           <input
//             type="text"
//             id="institucion"
//             name="institucion"
//             className="mt-1 p-2 w-full border border-gray-300 rounded-md"
//           />
//         </div>

//         <div className="mb-4">
//           <label htmlFor="cantidadHoras" className="block text-sm font-medium text-gray-600">
//             Cantidad de Horas
//           </label>
//           <input
//             type="number"
//             id="cantidadHoras"
//             name="cantidadHoras"
//             className="mt-1 p-2 w-full border border-gray-300 rounded-md"
//           />
//         </div>

//         {/* Columna 3 */}
//         <div className="mb-4">
//           <label htmlFor="fecha" className="block text-sm font-medium text-gray-600">
//             Fecha
//           </label>
//           <input
//             type="date"
//             id="fecha"
//             name="fecha"
//             className="mt-1 p-2 w-full border border-gray-300 rounded-md"
//           />
//         </div>
//       </form>
//     </div>
//   );
// };

// export default FormNuevaTiposCapacitaciones;


import React, { useState } from "react";
import axios from 'axios';
import Swal from 'sweetalert2';

const FormNuevaTiposCapacitaciones = () => {
  const [formData, setFormData] = useState({
    nombre: "",
    descripcion: "",
    tipoEvento: "",
    institucion: "",
    cantidadHoras: "",
    fecha: ""
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await axios.post(
        "http://127.0.0.1:8000/api/capacitaciones",
        formData
      );
      if (response.status === 200) {
        Swal.fire({
          icon: 'success',
          title: 'Éxito',
          text: 'El tipo de capacitación se ha creado correctamente',
        });
      }
      console.log('Tipo de capacitación creada correctamente');
      // Aquí puedes realizar acciones adicionales después de la creación, como limpiar el formulario, redirigir, etc.

    } catch (error) {
      console.error("Error al crear el tipo de capacitación:", error);
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Hubo un error al crear el tipo de capacitación',
      });
    }
  };

  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form onSubmit={handleSubmit} className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {/* Columna 1 */}
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
          <label htmlFor="tipoEvento" className="block text-sm font-medium text-gray-600">
            Tipo de Evento
          </label>
          <input
            type="text"
            id="tipoEvento"
            name="tipoEvento"
            value={formData.tipoEvento}
            onChange={handleChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        {/* Columna 2 */}
        <div className="mb-4">
          <label htmlFor="institucion" className="block text-sm font-medium text-gray-600">
            Institución
          </label>
          <input
            type="text"
            id="institucion"
            name="institucion"
            value={formData.institucion}
            onChange={handleChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <div className="mb-4">
          <label htmlFor="cantidadHoras" className="block text-sm font-medium text-gray-600">
            Cantidad de Horas
          </label>
          <input
            type="number"
            id="cantidadHoras"
            name="cantidadHoras"
            value={formData.cantidadHoras}
            onChange={handleChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        {/* Columna 3 */}
        <div className="mb-4">
          <label htmlFor="fecha" className="block text-sm font-medium text-gray-600">
            Fecha
          </label>
          <input
            type="date"
            id="fecha"
            name="fecha"
            value={formData.fecha}
            onChange={handleChange}
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
          />
        </div>

        <button
          type="submit"
          className="bg-blue-700 text-white py-2 px-5 rounded-lg"
        >
          GUARDAR
        </button>
      </form>
    </div>
  );
};

export default FormNuevaTiposCapacitaciones;
