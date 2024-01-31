import { useContext } from "react";
import JerarquiaCargosContext from "../providers/JerarquiaCargosProvider";
const useJerarquiaCargos = () => {
  return useContext(JerarquiaCargosContext);
};

export default useJerarquiaCargos;
