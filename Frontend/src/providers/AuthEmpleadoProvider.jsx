import React, { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";

const AuthEmpleadoContext = createContext();

const AuthEmpleadoProvider = ({ children }) => {
  const [obtenerMiCargo, setObtenerMiCargo] = useState({});
  const [obtenerMiInformacion, setObtenerMiInformacion] = useState({});
  const [obtenerMisDatosLaborales, setObtenerMisDatosLaborales] = useState({});
  const [obtenerMisDatosUsuario, setObtenerMisDatosUsuario] = useState({});

  const { auth } = useAuth();

  useEffect(() => {
    const obtenerMiCargo = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const { data } = await clienteAxios("administrador/mi-cargo", config);
        setObtenerMiCargo(data.datos);
      } catch (error) {
        console.log(error);
        // Puedes manejar errores según tus necesidades
      }
    };

    const obtenerMiInformacion = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const { data } = await clienteAxios(
          "administrador/mis-datos-personales",
          config
        );
        setObtenerMiInformacion(data.datos);
      } catch (error) {
        console.log(error);
        // Puedes manejar errores según tus necesidades
      }
    };

    const obtenerMisDatosLaborales = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const { data } = await clienteAxios("administrador/mis-datos-laborales", config);
        setObtenerMisDatosLaborales(data.datos);
      } catch (error) {
        console.log(error);
        // Puedes manejar errores según tus necesidades
      }
    };

    const obtenerMisDatosUsuario = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const { data } = await clienteAxios("administrador/mis-datos-usuario", config);
        setObtenerMisDatosUsuario(data.datos);
      } catch (error) {
        console.log(error);
        // Puedes manejar errores según tus necesidades
      }

    };
    obtenerMisDatosUsuario(),
      obtenerMisDatosLaborales();
    obtenerMiCargo();
    obtenerMiInformacion();
  }, [auth]);

  const actualizarMisDatosUsuario = async (nuevosDatos) => {
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
        "administrador/actualizar-mis-datos-usuario",
        nuevosDatos,
        config
      );

      // Puedes manejar la respuesta según tus necesidades
      console.log(data);

      // Actualizar los datos en el estado local si es necesario
      setObtenerMisDatosUsuario(data.datos);
    } catch (error) {
      console.log(error);
      // Puedes manejar errores según tus necesidades
    }
  };

  const contextValue = {
    obtenerMiCargo,
    obtenerMiInformacion,
    obtenerMisDatosLaborales,
    obtenerMisDatosUsuario,
    actualizarMisDatosUsuario,
  };

  return (
    <AuthEmpleadoContext.Provider value={contextValue}>
      {children}
    </AuthEmpleadoContext.Provider>
  );
};

export { AuthEmpleadoProvider, AuthEmpleadoContext };
