// context/DirrecionesProvider.jsx
import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const DireccionesContext = createContext();

const DireccionesProvider = ({ children }) => {
  const [direcciones, setDirecciones] = useState([]);
  const [cargando, setCargando] = useState(true); // Establece inicialmente como cargando
  const navigate = useNavigate();

  useEffect(() => {
    const getDirecciones = async () => {
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
  
        const { data } = await clienteAxios("/direcciones", config);
        setDirecciones(data.data);
    
      } catch (error) {
        console.error("Error al obtener direcciones:", error);
      } finally {
        setCargando(false);
      }
    };
  
    // Fetch data when component mounts
    getDirecciones();
  }, []);
  

  const contextValue = {
    direcciones,
  };

  return (
    <DireccionesContext.Provider value={contextValue}>
      {children}
    </DireccionesContext.Provider>
  );
};

export { DireccionesProvider };
export default DireccionesContext;
