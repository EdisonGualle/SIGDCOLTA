// context/UnidadesProvider.jsx
import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const UnidadesContext = createContext();

const UnidadesProvider = ({ children }) => {
  const [unidades, setUnidades] = useState([]);
  const [cargando, setCargando] = useState(true); // Establece inicialmente como cargando
  const navigate = useNavigate();

  useEffect(() => {
    const getUnidades = async () => {
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
  
        const { data } = await clienteAxios("/unidades", config); // Actualiza la ruta según tu API
        setUnidades(data.data);
    
      } catch (error) {
        console.error("Error al obtener unidades:", error);
      } finally {
        setCargando(false);
      }
    };
  
    // Fetch data when component mounts
    getUnidades();
  }, []);
  

  const contextValue = {
    unidades,
  };

  return (
    <UnidadesContext.Provider value={contextValue}>
      {children}
    </UnidadesContext.Provider>
  );
};

export { UnidadesProvider };
export default UnidadesContext;
