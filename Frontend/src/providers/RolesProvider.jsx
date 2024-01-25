// context/RolesProvider.jsx
import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const RolesContext = createContext();

const RolesProvider = ({ children }) => {
  const [roles, setRoles] = useState([]);
  const [cargando, setCargando] = useState(true);
  const navigate = useNavigate();

  useEffect(() => {
    const getRoles = async () => {
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
  
        const { data } = await clienteAxios("/roles", config); 
        setRoles(data.data);
    
      } catch (error) {
        console.error("Error al obtener roles:", error);
      } finally {
        setCargando(false);
      }
    };
  
    // Fetch roles data when component mounts
    getRoles();
  }, []);

  const contextValue = {
    roles,
  };

  return (
    <RolesContext.Provider value={contextValue}>
      {children}
    </RolesContext.Provider>
  );
};

export { RolesProvider };
export default RolesContext;
