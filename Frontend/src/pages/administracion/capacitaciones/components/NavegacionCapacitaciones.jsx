// NavegacionCapacitaciones.jsx
// eslint-disable-next-line no-unused-vars
import React from "react";
import { Link } from "react-router-dom";

function NavegacionCapacitaciones() {
  return (
    <>
      {/* Navbar */}
      <nav className="pb-3 text-white rounded-lg">
        <ul className="flex">
          {/* Mostrar empleados con capacitaciones */}
          <li className="border-r border-gray-300 ">
            <Link
              to="/administracion/empleados-capacitaciones"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2 rounded-tl-lg rounded-bl-lg  transition"
            >
              Mostrar Empleados con Capacitaciones
            </Link>
          </li>
          {/* Capacitaciones */}
          <li className=" border-r  border-gray-300 ">
            <Link
              to="/administracion/capacitaciones"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2   transition"
            >
              Capacitaciones
            </Link>
          </li>
          {/* Asignar */}
          <li className="border-r  border-gray-300">
            <Link
              to="/administracion/asignar-capacitaciones"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2  transition"
            >
              Asignar Capacitación
            </Link>
          </li>

          {/* Otros enlaces */}
          {/* ... */}

        </ul>
      </nav>
    </>
  );
}

export default NavegacionCapacitaciones;
