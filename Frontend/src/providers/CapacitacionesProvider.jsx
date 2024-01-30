// // context/CapacitacionesProvider.jsx
// import { useState, useEffect, createContext } from "react";
// import { useNavigate } from "react-router-dom";
// import clienteAxios from "../config/clienteAxios";

// const CapacitacionesContext = createContext();

// const  CapacitacionesProvider  = ({ children }) => {
//     const [capacitaciones, setCapacitaciones] = useState([]);
//     const [cargando, setCargando] = useState(true);
//     const navigate = useNavigate();

//     useEffect(() => {
//         const getCapacitaciones = async () => {
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

//                 const { data } = await clienteAxios(
//                     "/empleados-con-capacitaciones",//cambiar en base a mi ruta
//                     config
//                 );
//                 setCapacitaciones(data.data);

//             } catch (error) {
//                 console.error("Error al obtener capacitaciones:", error);
//             } finally {
//                 setCargando(false);
//             }
//         };

//         // Fetch data when component mounts
//         getCapacitaciones();
//     }, []);

//     const contextValue = {
//         capacitaciones,
//     };


//     return (
//         <CapacitacionesContext.Provider value={contextValue}>
//             {children}
//         </CapacitacionesContext.Provider>
//     );
// };

// export { CapacitacionesProvider };
// export default CapacitacionesContext;


import React, { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";

const CapacitacionesContext = createContext();

const CapacitacionesProvider = ({ children }) => {
  const [capacitaciones, setCapacitaciones] = useState([]);
  const [cargando, setCargando] = useState(false);
  const [alerta, setAlerta] = useState({});
  const [capacitacion, setCapacitacion] = useState({});
  const [modalEliminarCapacitacion, setModalEliminarCapacitacion] = useState(false);

  const navigate = useNavigate();
  const { auth } = useAuth();

  useEffect(() => {
    const obtenerCapacitaciones = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };
        const { data } = await clienteAxios("/empleados-con-capacitaciones", config);
        setCapacitaciones(data.data);
      } catch (error) {
        console.log(error);
      }
    };
    obtenerCapacitaciones();
  }, []);

  const agregarCapacitacion = async (nuevoCapacitacion) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) return;

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      const { data } = await clienteAxios.post(
        "/asignacion-empleado-capacitacion",//ruta para agregar capacitacion
        nuevoCapacitacion,
        config
      );
      setCapacitaciones([...capacitaciones, data.data]);
      setAlerta({
        tipo: "success",
        mensaje: "Asignacion  agregada correctamente",
      });
    } catch (error) {
      console.log(error);
      setAlerta({ tipo: "error", mensaje: "Error al agregar la asignación" });
    }
  };

  const actualizarCapacitacion = async (id, nuevoCapacitacion) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) return;

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      const { data } = await clienteAxios.put(
        `/capacitaciones/${id}`,
        nuevoCapacitacion,
        config
      );
      setCapacitaciones(capacitaciones.map((e) => (e._id === id ? data.data : e)));
      setAlerta({
        tipo: "success",
        mensaje: "Asignacion actualizada correctamente",
      });
    } catch (error) {
      console.log(error);
      setAlerta({ tipo: "error", mensaje: "Error al actualizar Asignacion" });
    }
  };

  const eliminarCapacitacion= async (id) => {
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
      setCapacitaciones(capacitaciones.filter((capacitacion) => capacitacion.idEmpleado !== id));
      setAlerta({
        tipo: "success",
        mensaje: "Asignacion eliminada correctamente",
      });
    } catch (error) {
      console.log(error);
      setAlerta({ tipo: "error", mensaje: "Error al eliminar Asignacion" });
    }
  };

  const contextValue = {
    capacitaciones,
    agregarCapacitacion,
    actualizarCapacitacion,
    eliminarCapacitacion,
  };

  return (
    <CapacitacionesContext.Provider value={contextValue}>
      {children}
    </CapacitacionesContext.Provider>
  );
};

export { CapacitacionesProvider };

export default CapacitacionesContext;
