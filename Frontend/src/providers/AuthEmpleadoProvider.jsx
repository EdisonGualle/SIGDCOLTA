// AuthEmpleadoProvider.jsx
import React, { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";

const AuthEmpleadoContext = createContext();

const AuthEmpleadoProvider = ({ children }) => {
  const [miCargo, setMiCargo] = useState({});
  const [miInformacion, setMiInformacion] = useState({});
  const [misDatosLaborales, setMisDatosLaborales] = useState({});
  const [misDatosUsuario, setMisDatosUsuario] = useState({});
  const { auth } = useAuth();

  useEffect(() => {
    obtenerMisDatosUsuario();
    obtenerMiCargo();
    obtenerMiInformacion();
    obtenerMisDatosLaborales();
  }, []); // El arreglo de dependencias vacío hace que useEffect se ejecute solo una vez al montar el componente

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

      const { data } = await clienteAxios(
        "administrador/mis-datos-usuario",
        config
      );
      setMisDatosUsuario(data.datos);
    } catch (error) {
      console.log(error);
      // Puedes manejar errores según tus necesidades
    }
  };

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
      setMiCargo(data.datos);
    } catch (error) {
      console.log(error);
      // Puedes manejar errores según tus necesidades
    }
  };

  const obtenerMiCargoPorId = async (idEmpleado) => {
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
        "administrador/miCargoPorId/" + idEmpleado + "",
        config
      );
      setMiCargo(data.datos);
    } catch (error) {
      console.log(error);
      // Puedes manejar errores según tus necesidades
    }
  };

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
      setMisDatosUsuario(data.datos);
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
      setMiInformacion(data.datos);
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

      const { data } = await clienteAxios(
        "administrador/mis-datos-laborales",
        config
      );
      setMisDatosLaborales(data.datos);
    } catch (error) {
      console.log(error);
      // Puedes manejar errores según tus necesidades
    }
  };

  return (
    <AuthEmpleadoContext.Provider
      value={{
        misDatosUsuario,
        miCargo,
        misDatosLaborales,
        miInformacion,
        misDatosUsuario,
        obtenerMiCargo,
        obtenerMiInformacion,
        obtenerMisDatosLaborales,
        actualizarMisDatosUsuario,
        obtenerMisDatosUsuario,
        obtenerMiCargoPorId
      }}
    >
      {children}
    </AuthEmpleadoContext.Provider>
  );
};

export { AuthEmpleadoProvider };
export default AuthEmpleadoContext;
