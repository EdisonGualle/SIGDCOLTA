import { useContext } from "react";
import PosicionesLaboralesContext from "../providers/PosicionesLaborales";
const usePosicionesLaborales = () => {
  return useContext(PosicionesLaboralesContext);
};

export default usePosicionesLaborales;
