import { useContext } from "react";
import { ContratosContext } from "../providers/ContratosProvider";
const useContratos = () => {
    return useContext(ContratosContext);
};
export default useContratos