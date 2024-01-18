import { useContext } from "react";
import EmpleadosContext from "../context/EmpleadosProvider";

const useEmpleados = () => {
  return useContext(EmpleadosContext);
};

export default useEmpleados;
