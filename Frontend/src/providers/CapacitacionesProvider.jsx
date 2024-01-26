// context/CapacitacionesProvider.jsx
import { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";

const CapacitacionesContext = createContext();

const  CapacitacionesProvider  = ({ children }) => {
    const [capacitaciones, setCapacitaciones] = useState([]);
    const [cargando, setCargando] = useState(true);
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
                    "/empleados-con-capacitaciones",//cambiar en base a mi ruta
                    config
                );
                setCapacitaciones(data.data);

            } catch (error) {
                console.error("Error al obtener capacitaciones:", error);
            } finally {
                setCargando(false);
            }
        };

        // Fetch data when component mounts
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
