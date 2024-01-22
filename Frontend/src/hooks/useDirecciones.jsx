import { useContext } from "react";
import DireccionesContext from "../context/DireccionesProvider";

const useDirecciones = () => {
  return useContext(DireccionesContext);
};

export default useDirecciones;
