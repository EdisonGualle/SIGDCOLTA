import { useContext } from "react";
import CargosContext from "../providers/CargosProvider";
const useCargos = () => {
  return useContext(CargosContext);
};

export default useCargos;
