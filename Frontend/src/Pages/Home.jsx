import React, { useContext, useEffect } from "react";
import EmpleadosContext from "../Context/EmpleadosContext";

const Home = () => {
  // Renombra la variable para evitar conflictos de nombres
  const empleadosContext = useContext(EmpleadosContext);
  // Asegúrate de que "empleados" esté desestructurado correctamente del contexto
  const { empleados } = empleadosContext;
  console.log(empleados);
  return (
    <div>
      {/* Puedes usar la variable "empleados" que obtuviste del contexto */}
      <p>Lista de cedulas Empleados</p>
      {empleados.map((empleado) => (
        <p key={empleado.idEmpleado}>{empleado.cedula}</p>
      ))}
      {/* ... hacer algo con "empleados" aquí ... */}
    </div>
  );
};

export default Home;
