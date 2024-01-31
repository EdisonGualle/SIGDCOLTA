// // context/PosicionesLaboralesProvider.jsx
// import { useState, useEffect, createContext } from "react";
// import { useNavigate } from "react-router-dom";
// import clienteAxios from "../config/clienteAxios";

// const TiposCapacitacionesContext = createContext();

// const TiposCapacitacionesProvider = ({ children }) => {
//     const [TiposCapacitaciones, setTiposCapacitaciones] = useState([]);
//     const [cargando, setCargando] = useState(true); // Establece inicialmente como cargando
//     const navigate = useNavigate();

//     useEffect(() => {
//         const getTiposCapacitaciones = async () => {
//             try {
//                 const token = localStorage.getItem("token");
//                 if (!token) {
//                     setCargando(false);
//                     return navigate("/");
//                 }

//                 const config = {
//                     headers: {
//                         "Content-Type": "application/json",
//                         Authorization: `Bearer ${token}`,
//                     },
//                 };

//                 const { data } = await clienteAxios("/capacitaciones", config);
//                 setTiposCapacitaciones(data.data);


//             } catch (error) {
//                 console.error("Error al obtener tipos de capacitaciones:", error);
//             } finally {
//                 setCargando(false);
//             }
//         };

//         // Fetch data when component mounts
//         getTiposCapacitaciones();
//     }, []);

//     const contextValue = {
//         TiposCapacitaciones,
//     };

//     return (
//         <TiposCapacitacionesContext.Provider value={contextValue}>
//             {children}
//         </TiposCapacitacionesContext.Provider>
//     );
// };

// export { TiposCapacitacionesProvider };
// export default TiposCapacitacionesContext;




import React, { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";

const TiposCapacitacionesContext = createContext();
const TiposCapacitacionesProvider = ({ children }) => {
  const [TiposCapacitaciones, setTiposCapacitaciones] = useState([]);
  const [cargando, setCargando] = useState(false);
  const [alerta, setAlerta] = useState({});
  const [TipoCapacitacion, setTipoCapacitacion] = useState({});
  const [modalEliminarTipoCapacitacion, setModalEliminarTipoCapacitacion] = useState(false);

  const navigate = useNavigate();
  const { auth } = useAuth();

  useEffect(() => {
    const obtenerTipoCapacitaciones = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };
        const { data } = await clienteAxios("/capacitaciones", config);
 
        setTiposCapacitaciones(data.data);
      } catch (error) {
        console.log(error);
      }
    };
    obtenerTipoCapacitaciones();
  }, [auth]);


  const agregarTipoCapacitacion = async (nuevoTipoCapacitacion) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) {
        setAlerta({
          mensaje: "Token not available. Please log in.",
          error: true,
        });
        return;
      }

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      const response = await clienteAxios.post(
        "/capacitaciones",
        nuevoTipoCapacitacion,
        config
      );
      const { data } = response;

      if (!data.original.successful) {
        // Si la solicitud no fue exitosa, mostrar mensajes de error
        const errors = data.original.errors;
        Object.keys(errors).forEach((campo) => {
          const mensajesError = errors[campo].join(", ");
          /*           console.error(`${campo}: ${mensajesError}`); */
          setAlerta({
            tipo: "error",
            mensaje: `Error al agregar el tipo de capacitación: ${mensajesError}`,
          });
        });
      } else {
        setAlerta({
          tipo: "success",
          mensaje: "Tipo de capacitación agregado exitosamente",
        });

        // La solicitud fue exitosa, puedes manejarlo de acuerdo a tus necesidades
      }
    } catch (error) {
      console.error("Error al agregar tipo de capacitación:", error);
    }
  };

  
  const actualizarTipoCapacitacion = async (idCapacitacion, nuevoTipoCapacitacion) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) return;

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      const response = await clienteAxios.put(
        `/capacitaciones/${idCapacitacion}`,
        nuevoTipoCapacitacion,
        config
      );

      if (response.status === 200) {
        setAlerta({
          tipo: "success",
          mensaje: "Tipo de capacitación actualizado correctamente",
        });

        // Actualizar el estado de empleados después de la actualización exitosa
        const nuevosTiposCapacitaciones  = TiposCapacitaciones.map((TipoCapacitacion) => {
          if (TipoCapacitacion.idCapacitacion === idCapacitacion) {
            return { ...TipoCapacitacion, ...nuevoTipoCapacitacion };
          }
          return TipoCapacitacion;
        });

        setTiposCapacitaciones(nuevosTiposCapacitaciones);
      } else {
        setAlerta({ tipo: "error", mensaje: "Error al actualizar tipo de capacitación" });
      }
    } catch (error) {
      console.log(error);
      setAlerta({ tipo: "error", mensaje: "Error al actualizar tipo de capacitación" });
    }
  };

  const eliminarTipoCapacitacion = async (id) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) return;

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      await clienteAxios.delete(`/capacitaciones/${id}`, config);
      setTiposCapacitaciones(TiposCapacitaciones.filter((TipoCapacitacion) => TipoCapacitacion.idCapacitacion !== id));
      setAlerta({
        tipo: "success",
        mensaje: "Tipo de capacitación eliminado correctamente",
      });
    } catch (error) {
      console.log(error);
      setAlerta({ tipo: "error", mensaje: "Error al eliminar el tipo de capacitación" });
    }
  };

  const contextValue = {
    TiposCapacitaciones,
    agregarTipoCapacitacion,
    actualizarTipoCapacitacion,
    eliminarTipoCapacitacion,
    alerta,
  };

  return (
    <TiposCapacitacionesContext.Provider value={contextValue}>
      {children}
    </TiposCapacitacionesContext.Provider>
  );
};

export { TiposCapacitacionesProvider };

export default TiposCapacitacionesContext;

