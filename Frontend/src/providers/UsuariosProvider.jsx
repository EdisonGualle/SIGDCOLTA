// context/UsuariosProvider.jsx
import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const UsuariosContext = createContext();

const UsuariosProvider = ({ children }) => {
  const [usuarios, setUsuarios] = useState([]);
  const [cargandoUsuarios, setCargandoUsuarios] = useState(true);
  const navigate = useNavigate();

  useEffect(() => {
    const getUsuarios = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) {
          setCargandoUsuarios(false);
          return navigate("/");
        }

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const response = await clienteAxios.get("/usuarios", config); 
        // Asegúrate de que la estructura de datos es correcta, aquí se asume que se espera un arreglo en response.data
        setUsuarios(response.data);
      } catch (error) {
        console.error("Error al obtener usuarios:", error);
      } finally {
        setCargandoUsuarios(false);
      }
    };

    // Fetch data when component mounts
    getUsuarios();
  }, []); 

  const contextValue = {
    usuarios,
    cargandoUsuarios,
  };

  return (
    <UsuariosContext.Provider value={contextValue}>
      {children}
    </UsuariosContext.Provider>
  );
};

export { UsuariosProvider };
export default UsuariosContext;
