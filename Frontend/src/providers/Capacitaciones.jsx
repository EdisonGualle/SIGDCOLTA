// context/CapacitacionesProvider.jsx
// eslint-disable-next-line no-unused-vars
import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const CapacitacionesContext = createContext();

// eslint-disable-next-line react/prop-types
const CapacitacionesProvider = ({ children }) => {
  const [capacitaciones, setCapacitaciones] = useState([]);
  const [, setCargando] = useState(true);
  const navigate = useNavigate();

  useEffect(() => {
    const getCapacitaciones = async () => {
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

        const { data } = await clienteAxios(
          "/empleados-con-capacitaciones",
          config
        );
        setCapacitaciones(data.data);

      } catch (error) {
        console.error("Error al obtener capacitaciones:", error);
      } finally {
        setCargando(false);
      }
    };

    // Obtener datos cuando el componente se monta
    getCapacitaciones();
  }, []);

  const contextValue = {
    capacitaciones,
  };

  return (
    <CapacitacionesContext.Provider value={contextValue}>
      {children}
    </CapacitacionesContext.Provider>
  );
};

export { CapacitacionesProvider };
export default CapacitacionesContext;
