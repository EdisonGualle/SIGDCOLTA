import { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";
const EmpleadosContext = createContext();

// eslint-disable-next-line react/prop-types
const EmpleadosProvider = ({ children }) => {
  const [empleados, setEmpleados] = useState([]);
  const [] = useState(false);
  const [] = useState({});
  const [] = useState({});
  const [] = useState(false);

  const { auth } = useAuth();

  useEffect(() => {
    const obtenerEmpleados = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };
        const { data } = await clienteAxios("/empleados", config);
        setEmpleados(data.data);
      } catch (error) {
        console.log(error);
      }
    };
    obtenerEmpleados();
  }, [auth]);

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
