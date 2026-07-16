import React, { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";

const JerarquiaCargosContext = createContext();

const JerarquiaCargosProvider = ({ children }) => {
  const [jerarquiaCargos, setJerarquiaCargos] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const getJerarquiaCargos = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const { data } = await clienteAxios("/jerarquia-cargos", config); // Ruta para obtener la jerarquía de cargos
        setJerarquiaCargos(data.data);
        setLoading(false); // Marcar como cargado una vez que los datos están disponibles
      } catch (error) {
        console.error("Error al obtener la jerarquía de cargos:", error);
        setLoading(false); // Marcar como cargado incluso si hay un error
      }
    };

    // Solo cargar la jerarquía de cargos si aún no ha sido cargada
    if (jerarquiaCargos.length === 0) {
      getJerarquiaCargos();
    }
  }, [jerarquiaCargos]);

  const contextValue = {
    jerarquiaCargos,
  };

  if (loading) {
    // Puedes mostrar un spinner o un indicador de carga aquí
    return <div>Cargando...</div>;
  }

  return (
    <JerarquiaCargosContext.Provider value={contextValue}>
      {children}
    </JerarquiaCargosContext.Provider>
  );
};

export { JerarquiaCargosProvider };
export default JerarquiaCargosContext;
