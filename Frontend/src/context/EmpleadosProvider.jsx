import { useNavigate } from "react-router-dom";
import { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";
const EmpleadosContext = createContext();

const EmpleadosProvider = ({ children }) => {
  const [empleados, setEmpleados] = useState([]);

  useEffect(() => {
    const getEmpleados = async () => {
      const token = localStorage.getItem("token");
      if (!token) {
        setCargando(false);
        return navigate("/");
      }
      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };
      const { data } = await clienteAxios("/empleados", config);
      setEmpleados(data.data);
      console.log(data.data);
    };
    // Fetch data when component mounts
    getEmpleados();
  }, []);

  const contextValue = {
    empleados,
  };

  return (
    <EmpleadosContext.Provider value={contextValue}>
      {children}
    </EmpleadosContext.Provider>
  );
};
export { EmpleadosProvider };

export default EmpleadosContext;
