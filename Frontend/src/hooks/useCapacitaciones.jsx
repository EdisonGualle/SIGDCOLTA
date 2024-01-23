// hooks/useCapacitaciones.js
import { useContext } from "react";
import CapacitacionesContext from "../providers/Capacitaciones";

const useCapacitaciones = () => {
  return useContext(CapacitacionesContext);
};

export default useCapacitaciones;
