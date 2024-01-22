import { useContext } from "react";
import UnidadesContext from "../providers/UnidadesProvider";
const useUnidades = () => {
  return useContext(UnidadesContext);
};

export default useUnidades;
