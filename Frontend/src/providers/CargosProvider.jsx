import React, { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";

const CargosContext = createContext();

const CargosProvider = ({ children }) => {
  const [cargos, setCargos] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const getCargos = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const { data } = await clienteAxios("/cargos", config); // Actualiza la ruta según tu API
        setCargos(data.data);
        setLoading(false); // Marcar como cargado una vez que los datos están disponibles
      } catch (error) {
        console.error("Error al obtener cargos:", error);
        setLoading(false); // Marcar como cargado incluso si hay un error
      }
    };

    // Solo cargar los cargos si aún no han sido cargados
    if (cargos.length === 0) {
      getCargos();
    }
  }, [cargos]);

  const contextValue = {
    cargos,
  };

  if (loading) {
    // Puedes mostrar un spinner o un indicador de carga aquí
    return <div>Cargando...</div>;
  }

  return (
    <CargosContext.Provider value={contextValue}>
      {children}
    </CargosContext.Provider>
  );
};

export { CargosProvider };
export default CargosContext;
