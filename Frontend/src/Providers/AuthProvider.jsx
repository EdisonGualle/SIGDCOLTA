// AuthProvider.jsx
import React, { useState, useContext, useEffect } from "react";
import axios from "axios";
import AuthContext from "../Context/AuthContext";

const API_URL = "http://localhost:8000/api";

const AuthProvider = ({ children }) => {
  const [isAuthenticated, setIsAuthenticated] = useState(
    Boolean(localStorage.getItem("access_token"))
  );

  const [error, setError] = useState({
    successful: false,
    message: "",
  });

  useEffect(() => {
    const token = localStorage.getItem("access_token");
    if (token) {
      setIsAuthenticated(true);
      setError({ successful: true, message: "ok" });
    }
  }, []);

  const loginUser = async (correo, password) => {
    try {
      if (!correo || !password) {
        setError({
          successful: false,
          message: "Todos los campos son obligatorios",
        });
        return { successful: false };
      }

      const response = await axios.post(`${API_URL}/ingresar`, {
        correo,
        password,
      });

      localStorage.setItem("access_token", response.data.access_token);
      setIsAuthenticated(true);
      setError({
        successful: true,
        message: "Inicio de sesión correcto",
      });

      return response.data;
    } catch (error) {
      handleAxiosError(error);
      setIsAuthenticated(false); // Asegurarse de establecer isAuthenticated en falso en caso de un error
      return { successful: false };
    }
  };

  const handleAxiosError = (error) => {
    if (axios.isAxiosError(error)) {
      console.error("Axios error:", error);

      if (error.response) {
        setError({
          successful: false,
          message:
            error.response.data.mensaje || "Error desconocido en el servidor",
        });
      } else if (error.request) {
        setError({
          successful: false,
          message: "Error no responde el servidor",
        });
      } else {
        setError({
          successful: false,
          message: "An unexpected error occurred.",
        });
      }
    } else {
      setError({
        successful: false,
        message: "An unexpected error occurred.",
      });
    }
  };

  const registerUser = async (username, password) => {
    try {
      const response = await axios.post(`${API_URL}/register`, {
        username,
        password,
      });
      if (response.data.success) {
        localStorage.setItem("authToken", response.data.token);
        setError({
          successful: true,
          message: "Registro exitoso",
        });
        return response.data;
      } else {
        throw new Error(
          response.data.message || "Error desconocido en el servidor"
        );
      }
    } catch (error) {
      handleAxiosError(error);
      return { successful: false };
    }
  };

  const logoutUser = () => {
    localStorage.removeItem("authToken");
    setError({
      successful: false,
      message: "Cierre de sesión exitoso",
    });
  };

  const contextValue = {
    isAuthenticated,
    error,
    loginUser,
    logoutUser,
    registerUser,
  };

  return (
    <AuthContext.Provider value={contextValue}>{children}</AuthContext.Provider>
  );
};

export default AuthProvider;
