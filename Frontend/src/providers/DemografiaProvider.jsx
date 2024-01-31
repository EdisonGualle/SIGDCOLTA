import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const DemografiaContext = createContext();

const DemografiaProvider = ({ children }) => {
  const [provincias, setProvincias] = useState([]);
  const [cantones, setCantones] = useState([]);
  const [cargando, setCargando] = useState(true);
  const navigate = useNavigate();

  useEffect(() => {
    const getProvinciasCantones = async () => {
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

        const [provinciasResponse, cantonesResponse] = await Promise.all([
          clienteAxios("/provincia", config),
          clienteAxios("/cantones", config),
        ]);

        setProvincias(provinciasResponse.data.data);
        setCantones(cantonesResponse.data.data);
      } catch (error) {
        //console.error("Error al obtener cargos:", error);
      } finally {
        setCargando(false);
      }
    };

    // Fetch data when component mounts
    getProvinciasCantones();
  }, []);

  const contextValue = {
    provincias,
    cantones,
  };

  return (
    <DemografiaContext.Provider value={contextValue}>
      {children}
    </DemografiaContext.Provider>
  );
};

export { DemografiaProvider };
export default DemografiaContext;
