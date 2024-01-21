import { useNavigate } from "react-router-dom";
import { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";
const EmpleadosContext = createContext();

const EmpleadosProvider = ({ children }) => {
  const [empleados, setEmpleados] = useState([]);
  const [cargando, setCargando] = useState(false);
  const [alerta, setAlerta] = useState({});
  const [empleado, setEmpleado] = useState({});
  const [modalEliminarEmpleado, setModalEliminarEmpleado] = useState(false);

  const navigate = useNavigate();
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
