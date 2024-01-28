import { useContext } from "react";
import { AuthEmpleadoContext } from "../providers/AuthEmpleadoProvider";
const useAuthEmpleado = () => {
  return useContext(AuthEmpleadoContext);
};

export default useAuthEmpleado;
