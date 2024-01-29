import { useContext } from "react";
import { AuthEmpleadoContext } from "../providers/AuthEmpleadoProvider";

const useAuthEmpleado = () => {
  const context = useContext(AuthEmpleadoContext);

  if (!context) {
    throw new Error("useAuthEmpleado debe ser utilizado dentro de AuthEmpleadoProvider");
  }

  const { obtenerMiCargo, obtenerMiInformacion, obtenerMisDatosLaborales, obtenerMisDatosUsuario } = context;
  
  return {
    obtenerMiCargo,
    obtenerMiInformacion,
    obtenerMisDatosLaborales,
    obtenerMisDatosUsuario
  };
};

export default useAuthEmpleado;
