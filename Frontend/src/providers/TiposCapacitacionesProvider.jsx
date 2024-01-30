// context/PosicionesLaboralesProvider.jsx
import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const TiposCapacitacionesContext = createContext();

const TiposCapacitacionesProvider = ({ children }) => {
    const [TiposCapacitaciones, setTiposCapacitaciones] = useState([]);
    const [cargando, setCargando] = useState(true); // Establece inicialmente como cargando
    const navigate = useNavigate();

    useEffect(() => {
        const getTiposCapacitaciones = async () => {
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

                const { data } = await clienteAxios("/capacitaciones", config);
                setTiposCapacitaciones(data.data);


            } catch (error) {
                console.error("Error al obtener tipos de capacitaciones:", error);
            } finally {
                setCargando(false);
            }
        };

        // Fetch data when component mounts
        getTiposCapacitaciones();
    }, []);

    const contextValue = {
        TiposCapacitaciones,
    };

    return (
        <TiposCapacitacionesContext.Provider value={contextValue}>
            {children}
        </TiposCapacitacionesContext.Provider>
    );
};

export { TiposCapacitacionesProvider };
export default TiposCapacitacionesContext;

