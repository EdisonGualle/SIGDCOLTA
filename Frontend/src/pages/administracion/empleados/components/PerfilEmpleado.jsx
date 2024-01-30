import React from "react";
import HeaderPerfilEmpleado from "./HeaderPerfilEmpleado";
import EstadisticasEmpleado from "./EstadisticasEmpleado";
import IndexEmpleado from "../../perfil/Index";
const PerfilEmpleado = ({ empleado }) => {
  console.log(empleado);
  return (
    <>
      <IndexEmpleado empleado={empleado} />
    </>
  );
};

export default PerfilEmpleado;
