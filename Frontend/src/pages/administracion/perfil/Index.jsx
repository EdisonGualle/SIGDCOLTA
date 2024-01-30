import React from "react";
import { Routes, Route, Outlet } from "react-router-dom";
import Sidebar from "./components/Sidebar/Sidebar";
import DatosPersonales from "./DatosPersonales";
import DatosLaborales from "./DatosLaborales";
import Asistencia from "./Asistencia";
import Habilidades from "./Habilidades";
import ConfiguracionPerfil from "./Configuracion";
import Dashboard from "./Dasboard";

const IndexPerfil = () => {
  return (
    <>
      <Sidebar />
      <div className=" h-64">
          <Outlet /> {/* Renderiza las rutas secundarias aquí */}
      </div>
    </>
  );
};

const Perfil = ({empleado}) => {
  return (
    <Routes>
      <Route path="/" element={<IndexPerfil />}>
        <Route path="dashboard" element={<Dashboard />} />
        <Route path="datos-personales" element={<DatosPersonales empleado={empleado} />} />
        <Route path="datos-laborales" element={<DatosLaborales />} />
        <Route path="asistencias" element={<Asistencia />} />
        <Route path="habilidades" element={<Habilidades />} />
        <Route path="configuracion" element={<ConfiguracionPerfil/>} />
      </Route>
    </Routes>
  );
};

export default Perfil;
