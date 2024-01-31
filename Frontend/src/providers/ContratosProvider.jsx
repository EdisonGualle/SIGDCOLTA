import { createContext, useState, useEffect } from "react";
import clienteAxios from "../config/clienteAxios";

const ContratosContext = createContext();

const ContratosProvider = ({ children }) => {
  const [contratos, setContratos] = useState([]);
  const [cargando, setCargando] = useState(false);
  const [tiposContratos, setTiposContratos] = useState([]);
  const [alerta, setAlerta] = useState({});
  const [contrato, setContrato] = useState({});
  const [modalEliminarContrato, setModalEliminarContrato] = useState(false);

  useEffect(() => {
    const obtenerContratos = async () => {
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

        const { data } = await clienteAxios("/contratos2", config);

        setContratos(data);
      } catch (error) {
        console.error("Error al cargar los datos:", error);
      } finally {
        setCargando(false);
      }
    };

    setCargando(true);
    obtenerContratos();
  }, []);

  const getTiposContrato = async () => {
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

      const { data } = await clienteAxios("/tipos-contrato", config);

      setTiposContratos(data.data);
    } catch (error) {
      console.error("Error al cargar los datos:", error);
    } finally {
      setCargando(false);
    }
  };

  const contextValue = {
    contratos,
    tiposContratos,
    getTiposContrato,
  };

  return (
    <ContratosContext.Provider value={contextValue}>
      {children}
    </ContratosContext.Provider>
  );
};

export { ContratosProvider, ContratosContext };
export default ContratosContext;
