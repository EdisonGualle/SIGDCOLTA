import { useContext } from "react";
import EmpleadosContext from "../providers/EmpleadosProvider";

const useEmpleados = () => {
  return useContext(EmpleadosContext);
};

export default useEmpleados;
