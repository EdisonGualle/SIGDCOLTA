import { useContext } from "react";
import EvaluacionesContext from "../providers/EvaluacionesProvider";

const useEvaluaciones = () => {
  return useContext(EvaluacionesContext);
};

export default useEvaluaciones;
