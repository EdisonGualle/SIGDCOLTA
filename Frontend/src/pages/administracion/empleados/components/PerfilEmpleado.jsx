import React from "react";
import HeaderPerfilEmpleado from "./HeaderPerfilEmpleado";
import EstadisticasEmpleado from "./EstadisticasEmpleado";
const PerfilEmpleado = ({empleado}) => {
    console.log(empleado);
  return (
    <>
      <div className=" bg-indigo-500 h-64">
        <HeaderPerfilEmpleado empleado={empleado}/>
        <EstadisticasEmpleado />
      </div>
    </>
  );
};

export default PerfilEmpleado;
