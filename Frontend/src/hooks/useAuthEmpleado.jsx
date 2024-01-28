import { useContext } from "react";
import { AuthEmpleadoContext } from "../providers/AuthEmpleadoProvider";

const useAuthEmpleado = () => {
  const context = useContext(AuthEmpleadoContext);

  if (!context) {
    throw new Error("useAuthEmpleado debe ser utilizado dentro de AuthEmpleadoProvider");
  }

  const { obtenerMiCargo, obtenerMiInformacion } = context;

  return {
    obtenerMiCargo,
    obtenerMiInformacion,
    // Puedes agregar más funciones aquí si es necesario
  };
};

export default useAuthEmpleado;
