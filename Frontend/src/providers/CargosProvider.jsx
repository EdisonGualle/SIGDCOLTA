import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const CargosContext = createContext();

const CargosProvider = ({ children }) => {
  const [cargos, setCargos] = useState([]);
  const [cargando, setCargando] = useState(true);
  const navigate = useNavigate();

  useEffect(() => {
    const getCargos = async () => {
      try {
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

        const { data } = await clienteAxios("/cargos", config); // Actualiza la ruta según tu API
        setCargos(data.data);
      } catch (error) {
        //console.error("Error al obtener cargos:", error);
      } finally {
        setCargando(false);
      }
    };

    // Fetch data when component mounts
    getCargos();
  }, []);

  const contextValue = {
    cargos,
  };

  return (
    <CargosContext.Provider value={contextValue}>
      {children}
    </CargosContext.Provider>
  );
};

export { CargosProvider };
export default CargosContext;
