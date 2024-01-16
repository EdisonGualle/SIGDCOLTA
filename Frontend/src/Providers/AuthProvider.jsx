import React from "react";
import EmpleadosContext from "../Context/EmpleadosContext";
import axios from "axios";
const API_URL = "http://localhost:8000/api";
const AuthProvider = ({ children }) => {
  const contextValue = {};
  return (
    <EmpleadosContext.Provider value={contextValue}>
      {children}
    </EmpleadosContext.Provider>
  );
};

export default AuthProvider;
