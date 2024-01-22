// context/PosicionesLaboralesProvider.jsx
import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const PosicionesLaboralesContext = createContext();

const PosicionesLaboralesProvider = ({ children }) => {
    const [posicionesLaborales, setPosicionesLaborales] = useState([]);
    const [cargando, setCargando] = useState(true); // Establece inicialmente como cargando
    const navigate = useNavigate();

    useEffect(() => {
        const getPosicionesLaborales = async () => {
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
                    "/empleados-por-posicion-laboral",
                    config
                );
                setPosicionesLaborales(data.data);

                console.log("Posiciones laborales obtenidas:", data.data); // Agrega este console.log
            } catch (error) {
                console.error("Error al obtener posiciones laborales:", error);
            } finally {
                setCargando(false);
            }
        };

        // Fetch data when component mounts
        getPosicionesLaborales();
    }, []);

    const contextValue = {
        posicionesLaborales,
    };

    return (
        <PosicionesLaboralesContext.Provider value={contextValue}>
            {children}
        </PosicionesLaboralesContext.Provider>
    );
};

export { PosicionesLaboralesProvider };
export default PosicionesLaboralesContext;
