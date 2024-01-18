import { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";
import { useNavigate } from "react-router-dom";
import useAuth from "../hooks/useAuth";
import io from "socket.io-client";

let socket;

const EmpleadosContext = createContext();
const EmpleadosProvider = ({ children }) => {
  const [empleados, setEmpleados] = useState([]);
  const [alerta, setAlerta] = useState({});
  const [empleado, setEmpleado] = useState({});
  const [cargando, setCargando] = useState(false);

  const navigate = useNavigate();
  const { auth } = useAuth();

  useEffect(() => {
    const obtenerEmpleados= async () => {
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
        setProyectos(data);
      } catch (error) {
        console.log(error);
      }
    };
    obtenerProyectos();
  }, [auth]);

  useEffect(() => {
    socket = io(import.meta.env.VITE_BACKEND_URL);
  }, []);

  return (
    <EmpleadosContext.Provider
        value={{
            empleados,
            setCargando,
            setAlerta,
        }}
        >{children}
        </EmpleadosContext.Provider>
    )
}
export { 
    EmpleadosProvider
}

export default EmpleadosContext