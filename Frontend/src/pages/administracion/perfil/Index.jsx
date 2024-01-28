import React from "react";
import { Routes, Route, Outlet } from "react-router-dom";
import Sidebar from "./components/Sidebar/Sidebar";
import Navbar from "./components/Navbars/AdminNavbar";
import HeaderStats from "./components/Headers/HeaderStats";
import DatosPersonales from "./DatosPersonales";
import DatosLaborales from "./DatosLaborales";
import Asistencia from "./Asistencia";
import useEmpleados from "../../../hooks/useEmpleados";
import Habilidades from "./Habilidades";
import Configuracion from "../../layouts/components/Configuracion";
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

const Perfil = () => {
  return (
    <Routes>
      <Route path="/" element={<IndexPerfil />}>
        <Route path="dashboard" element={<Dashboard />} />
        <Route path="datos-personales" element={<DatosPersonales />} />
        <Route path="datos-laborales" element={<DatosLaborales />} />
        <Route path="asistencias" element={<Asistencia />} />
        <Route path="habilidades" element={<Habilidades />} />
        <Route path="configuracion" element={<Configuracion/>} />
      </Route>
    </Routes>
  );
};

export default Perfil;
