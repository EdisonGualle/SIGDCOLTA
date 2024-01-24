import { useContext } from "react";
import UsuariosContext from "../providers/UsuariosProvider";

const useUsuarios = () => {
  return useContext(UsuariosContext);
};

export default useUsuarios;
