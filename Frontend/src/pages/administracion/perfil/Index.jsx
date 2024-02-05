import React from "react";
import { Routes, Route, Outlet } from "react-router-dom";
import Sidebar from "./components/Sidebar/Sidebar";
import DatosPersonales from "./DatosPersonales";
import DatosLaborales from "./DatosLaborales";
import Asistencia from "./Asistencia";
import Habilidades from "./Habilidades";
import ConfiguracionPerfil from "./Configuracion";
import Dashboard from "./Dasboard";


const Perfil = ({ empleado }) => {
  return (
    <>
      <Sidebar />

      <Routes>
        <Route path="/" element={<Dashboard empleado={empleado}/>} />
        <Route
          path="datos-personales"
          element={<DatosPersonales empleado={empleado} />}
        />
        <Route
          path="datos-laborales"
          element={<DatosLaborales empleado={empleado} />}
        />
        <Route path="asistencias" element={<Asistencia />} />
        <Route path="habilidades" element={<Habilidades />} />
        <Route path="configuracion" element={<ConfiguracionPerfil />} />
      </Routes>
    </>
  );
};

export default Perfil;
