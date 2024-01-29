import { useNavigate } from "react-router-dom";
import { createContext, useState, useEffect } from "react";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";
const AgregarContratoContext = createContext();

const AgregarContratoProvider = ({ children }) => {
  const [tiposContrato, setTiposContrato] = useState([]);
  const [cargando, setCargando] = useState(false);
  const [alerta, setAlerta] = useState({});
  const [tipoContrato, setTipoContrato] = useState({});
  // Puedes agregar más estados según tus necesidades

  const navigate = useNavigate();
  const { auth } = useAuth();

  useEffect(() => {
    const obtenerTiposContrato = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) {
          return;
        }

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const { data } = await clienteAxios("/contratos-empleados", config);

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
    <AgregarContratoContext.Provider value={contextValue}>
      {children}
    </AgregarContratoContext.Provider>
  );
};

export { AgregarContratoProvider, AgregarContratoContext };
export default AgregarContratoContext;
