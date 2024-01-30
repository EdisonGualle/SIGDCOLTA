import { useContext } from "react";
import TiposCapacitacionesContext from "../providers/TiposCapacitacionesProvider";
const useTiposCapacitaciones = () => {
  return useContext(TiposCapacitacionesContext);
};

export default useTiposCapacitaciones;