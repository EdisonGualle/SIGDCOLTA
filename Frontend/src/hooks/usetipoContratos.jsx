import { useContext } from "react";
import { TiposContratoContext } from "../providers/tipoContratosProvider";
const usetipoContratos = () => {
    return useContext(TiposContratoContext);
};
export default usetipoContratos