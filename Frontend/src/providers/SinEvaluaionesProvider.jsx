import React, { createContext, useState, useEffect } from "react";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";

// Creamos el contexto
const SinEvaluacionesContext = createContext();

// Creamos el proveedor
const SinEvaluacionesProvider = ({ children }) => {
  // Definimos el estado para las evaluaciones y otros datos necesarios
  const [sinevaluaciones, setSinEvaluaciones] = useState([]);
  const [cargandoSinEvaluaciones, setCargandoSinEvaluaciones] = useState(false);
  const [sinEvaluacionesCargadas, setSinEvaluacionesCargadas] = useState(false);
  const { auth } = useAuth();

  // Utilizamos useEffect para cargar las evaluaciones sin desempeño
  useEffect(() => {
    const obtenerSinEvaluaciones = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };

        const { data } = await clienteAxios("/sin-evaluaciones-desempeno", config);
        setSinEvaluaciones(data.data);
      } catch (error) {
        console.error("Error al cargar los datos:", error);
      } finally {
        setCargandoSinEvaluaciones(false); // Asegúrate de ajustar el estado según tus necesidades
        setSinEvaluacionesCargadas(true); // Marcamos que las evaluaciones sin desempeño han sido cargadas
      }
    };

    // Llamamos a la función para obtener las evaluaciones sin desempeño
    obtenerSinEvaluaciones();
  }, [auth]);

  // Definimos el valor del contexto que será accesible por los componentes hijos
  const contextValue = {
    sinevaluaciones,
  };

  // Renderizamos el proveedor con el valor del contexto y los hijos
  return (
    <SinEvaluacionesContext.Provider value={contextValue}>
      {children}
    </SinEvaluacionesContext.Provider>
  );
};

// Exportamos el proveedor y el contexto
export { SinEvaluacionesProvider, SinEvaluacionesContext };
