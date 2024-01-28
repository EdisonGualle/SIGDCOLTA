import React, { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";

const AuthEmpleadoContext = createContext();

const AuthEmpleadoProvider = ({ children }) => {
  const [obtenerMiCargo, setObtenerMiCargo] = useState({});
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

    obtenerMiCargo();
  }, [auth]);



  const contextValue = {
    obtenerMiCargo,
    // Puedes agregar más funciones aquí
  };

  return (
    <AuthEmpleadoContext.Provider value={contextValue}>
      {children}
    </AuthEmpleadoContext.Provider>
  );
};

export { AuthEmpleadoProvider, AuthEmpleadoContext };
