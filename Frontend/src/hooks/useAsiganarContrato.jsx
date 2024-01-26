import { useContext } from "react";
import { AgregarContratoContext } from "../providers/AsignarContratosProvider";

const useAsignarContrato = () => {
    return useContext(AgregarContratoContext);
};
export default useAsignarContrato