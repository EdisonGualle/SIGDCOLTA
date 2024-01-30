// hooks/useCapacitaciones.jsx
import { useContext } from "react";
import CapacitacionesContext from "../providers/CapacitacionesProvider";

const useCapacitaciones = () => {
  return useContext(CapacitacionesContext);
};

export default useCapacitaciones;
