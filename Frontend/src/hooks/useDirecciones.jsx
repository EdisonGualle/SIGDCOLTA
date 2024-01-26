import { useContext } from "react";
import DireccionesContext from "../providers/DireccionesProvider";
const useDirecciones = () => {
  return useContext(DireccionesContext);
};

export default useDirecciones;
