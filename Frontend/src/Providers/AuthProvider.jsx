import React, { useState, useContext } from "react";
import axios from "axios";
import AuthContext from "../Context/AuthContext";

const API_URL = "http://localhost:8000/api";

const AuthProvider = ({ children }) => {
  const [error, setError] = useState({
    successful: false,
    message: "",
  });

  const loginUser = async (correo, password) => {
    try {
      if (correo.trim() === "" || password.trim() === "") {
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

      setError({
        successful: true,
        message: "Inicio de sesión correcto",
      });

      return response.data;
    } catch (error) {
      handleAxiosError(error);
    }
  };

  const handleAxiosError = (error) => {
    if (error.response) {
      setError({
        successful: false,
        message: error.response.data.mensaje,
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
  };

  const registerUser = async (username, password) => {
    try {
      const response = await axios.post(`${API_URL}/register`, {
        username,
        password,
      });
      if (response.data.success) {
        localStorage.setItem("authToken", response.data.token);
        return response.data;
      } else {
        throw new Error(response.data.message);
      }
    } catch (error) {
      throw error;
    }
  };

  const logoutUser = () => {
    localStorage.removeItem("authToken");
  };

  const contextValue = {
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
