import { createContext, useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const TiposContratoContext = createContext();

const TiposContratoProvider = ({ children }) => {
  const [tiposContrato, setTiposContrato] = useState([]);
  const [cargando, setCargando] = useState(false);
  const navigate = useNavigate();
  
  
  useEffect(() => {
    const obtenerTiposContrato = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) {
          setCargando(false);
          return navigate("/");;
        }

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const { data } = await clienteAxios("/contratos-tipo", config);
        setTiposContrato(data.data); // Intenta acceder a la propiedad correcta

      } catch (error) {
        console.error("Error al cargar los datos:", error);
      } finally {
        setCargando(false); // Asegúrate de ajustar el estado según tus necesidades
      }
    };

    obtenerTiposContrato();
  }, [auth]);

  const contextValue = {
    tiposContrato,
    // Puedes agregar más datos al contexto según tus necesidades
  };

  return (
    <TiposContratoContext.Provider value={contextValue}>
      {children}
    </TiposContratoContext.Provider>
  );
};

export { TiposContratoProvider, TiposContratoContext };
export default TiposContratoContext;
