import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const JerarquiaCargosContext = createContext();

const JerarquiaCargosProvider = ({ children }) => {
  const [jerarquiaCargos, setJerarquiaCargos] = useState([]);
  const [cargando, setCargando] = useState(true); // Establece inicialmente como cargando
  const navigate = useNavigate();

  useEffect(() => {
    const getJerarquiaCargos = async () => {
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

        const { data } = await clienteAxios("/jerarquia-cargos", config); // Ruta para obtener la jerarquía de cargos
        setJerarquiaCargos(data.data);

      } catch (error) {
        console.error("Error al obtener la jerarquía de cargos:", error);
      } finally {
        setCargando(false);
      }
    };

    // Fetch data when component mounts
    getJerarquiaCargos();
  }, []);

  const contextValue = {
    jerarquiaCargos,
  };

  return (
    <JerarquiaCargosContext.Provider value={contextValue}>
      {children}
    </JerarquiaCargosContext.Provider>
  );
};

export { JerarquiaCargosProvider };
export default JerarquiaCargosContext;
