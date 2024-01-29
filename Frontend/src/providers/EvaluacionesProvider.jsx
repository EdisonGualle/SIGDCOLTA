import { useNavigate } from "react-router-dom";
import { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";
const EvaluacionesContext = createContext();

const EvaluacionesProvider = ({ children }) => {
  const [evaluaciones, setEvaluaciones] = useState([]);
  const [cargando, setCargando] = useState(false);
  const [alerta, setAlerta] = useState({});
  const [empleado, setEmpleado] = useState({});
  const [modalEliminarEmpleado, setModalEliminarEmpleado] = useState(false);

  const navigate = useNavigate();
  const { auth } = useAuth();

  useEffect(() => {
    const obtenerEvaluaciones = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };
        const { data } = await clienteAxios("/evaluaciones-desempeno", config);
        setEvaluaciones(data.data);
      } catch (error) {
        console.log(error);
      }
    };
    obtenerEvaluaciones();
  }, [auth]);

  const contextValue = {
    evaluaciones,
  };

  return (
    <EvaluacionesContext.Provider value={contextValue}>
      {children}
    </EvaluacionesContext.Provider>
  );
};
export { EvaluacionesProvider };

export default EvaluacionesContext;
