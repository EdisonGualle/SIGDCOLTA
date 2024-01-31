import { useContext } from "react";
import { SinEvaluacionesContext } from "../providers/SinEvaluaionesProvider";

const useSinEvaluaciones = () => {
  return useContext(SinEvaluacionesContext);
};

export default useSinEvaluaciones;
