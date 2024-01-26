import { useNavigate } from "react-router-dom";
import { createContext, useState, useEffect } from "react";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";
const ContratosContext = createContext();

const ContratosProvider = ({ children }) => {
  const [contratos, setContratos] = useState([]);
  const [cargando, setCargando] = useState(false);
  const [alerta, setAlerta] = useState({});
  const [contrato, setContrato] = useState({});
  const [modalEliminarContrato, setModalEliminarContrato] = useState(false);
  // Puedes agregar más estados según tus necesidades

  const { auth } = useAuth();

  useEffect(() => {
    const obtenerContratos = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) {
          console.log("No hay token, no se cargaron los datos.");
          return;
        }

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const { data } = await clienteAxios("/contratos2", config);

        console.log(data); // Verifica la estructura de la respuesta
        setContratos(data); // Intenta acceder a la propiedad correcta

      } catch (error) {
        console.error("Error al cargar los datos:", error);
      } finally {
        setCargando(false); // Asegúrate de ajustar el estado según tus necesidades
      }
    };

    setCargando(true);
    obtenerContratos();
  }, [auth]);


  const contextValue = {
    contratos,
    // Puedes agregar más datos al contexto según tus necesidades
  };

  return (
    <ContratosContext.Provider value={contextValue}>
      {children}
    </ContratosContext.Provider>
  );
};

export { ContratosProvider, ContratosContext };
export default ContratosContext;
