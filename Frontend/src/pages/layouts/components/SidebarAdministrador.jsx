import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
// Icons
import {
  RiCalendarTodoLine,
  RiLogoutCircleRLine,
  RiArrowRightSLine,
  RiMenu3Line,
  RiCloseLine,
  RiUser3Line,
  RiDashboardLine,
  RiUserStarLine,
  RiBriefcase2Line,
  RiSettings3Line,
} from "react-icons/ri";

import { GoChecklist } from "react-icons/go";
import { LiaFileContractSolid } from "react-icons/lia";
import { BsClipboard2Check } from "react-icons/bs";
import { MdOutlineAssessment } from "react-icons/md";
import { HiOutlineBuildingOffice2 } from "react-icons/hi2";

import useAuth from "../../../hooks/useAuth";

const SidebarAdministrador = () => {
  const { auth, cerrarSesionAuth } = useAuth();
  const [showMenu, setShowMenu] = useState(false);
  const [showSubmenu, setShowSubmenu] = useState(false);
  const handleCerrarSesion = () => {
    cerrarSesionAuth();
    localStorage.removeItem("token");
  };

  const [activeSubmenus, setActiveSubmenus] = useState([]);

  const toggleSubMenu = (index) => {
    setActiveSubmenus((prevSubmenus) => {
      if (prevSubmenus.includes(index)) {
        return prevSubmenus.filter((item) => item !== index);
      } else {
        return [...prevSubmenus, index];
      }
    });
  };

  return (
    <>
      <div
        className={`xl:h-[100vh] overflow-y-scroll fixed xl:static w-[80%] md:w-[40%] lg:w-[30%] xl:w-auto h-full top-0 bg-secondary-900 p-4 flex flex-col justify-between z-50 ${
          showMenu ? "left-0" : "-left-full"
        } transition-all`}
      >
        <div>
          <h1 className="text-center text-2xl font-bold text-primary mb-10">
            SIGDCOLTA<span className="text-secondary-100 text-4xl">.</span>
          </h1>
          <ul>
            <li>
              <Link
                to="/administracion"
                className="flex text-secondary-100  items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <RiDashboardLine className="text-primary" /> Dashboard
              </Link>
            </li>

            {/* Mi Perfil */}
            <li>
              <Link
                to="/administracion/perfil"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <RiUser3Line className="text-primary" /> Mi Perfil
              </Link>
            </li>
            {/* Asistencia */}
            <li>
              <Link
                to="/administracion/asistencia"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <GoChecklist className="text-primary" /> Asistencia
              </Link>
            </li>
            {/* Empleados */}
            <li>
              <Link
                to="/administracion/empleados"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <RiUserStarLine className="text-primary" /> Empleados
              </Link>
            </li>
            {/* Usuarios */}
            <li>
              <Link
                to="/administracion/usuarios"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <RiUser3Line className="text-primary" /> Usuarios
              </Link>
            </li>
            {/*Contratos */}
            <li>
              <Link
                to="/tickets"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <LiaFileContractSolid className="text-primary" /> Contratos
              </Link>
            </li>

            {/* Capacitaciones */}
            <li>
              <Link
                to="/tickets"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <RiBriefcase2Line className="text-primary" /> Capacitaciones
              </Link>
            </li>
            {/* Posicion laboral */}
            <li>
              <Link
                to="/administracion/posiciones-laborales"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <RiUser3Line className="text-primary" /> Posiciones laborales
              </Link>
            </li>
            {/* Permisos */}
            <li>
              <button
                onClick={() => toggleSubMenu(4)}
                className="w-full flex text-secondary-100 items-center justify-between py-2 px-4 rounded-lg hover:bg-secondary-100    hover:text-black transition-colors"
              >
                <span className="flex items-center gap-4">
                  <BsClipboard2Check className="text-primary" /> Permisos
                </span>
                <RiArrowRightSLine
                  className={`mt-1 ${
                    activeSubmenus.includes(4) && "rotate-90"
                  } transition-all`}
                />
              </button>
              <ul
                className={` ${
                  activeSubmenus.includes(4) ? "h-[130px]" : "h-0"
                } overflow-y-hidden transition-all`}
              >
                <li>
                  <Link
                    to="/"
                    className="py-2 text-secondary-100 px-4 border-l border-gray-500 ml-6 block relative before:w-3 before:h-3 before:absolute before:bg-primary before:rounded-full before:-left-[6.5px] before:top-1/2 before:-translate-y-1/2 before:border-4 before:border-secondary-100 hover:text-primary transition-colors"
                  >
                    Todos
                  </Link>
                </li>
                <li>
                  <Link
                    to="/"
                    className="py-2   text-secondary-100 px-4 border-l border-gray-500 ml-6 block relative before:w-3 before:h-3 before:absolute before:bg-gray-500 before:rounded-full before:-left-[6.5px] before:top-1/2 before:-translate-y-1/2 before:border-4 before:border-secondary-100 hover:text-primary transition-colors"
                  >
                    Por aprobar
                  </Link>
                </li>

                <li>
                  <Link
                    to="/"
                    className="py-2  text-secondary-100 px-4 border-l border-gray-500 ml-6 block relative before:w-3 before:h-3 before:absolute before:bg-gray-500 before:rounded-full before:-left-[6.5px] before:top-1/2 before:-translate-y-1/2 before:border-4 before:border-secondary-100 hover:text-primary transition-colors"
                  >
                    Solicitar permiso
                  </Link>
                </li>
              </ul>
            </li>
            {/* Horarios*/}
            <li>
              <button
                onClick={() => toggleSubMenu(6)}
                className="w-full flex text-secondary-100 items-center justify-between py-2 px-4 rounded-lg hover:bg-secondary-100    hover:text-black transition-colors"
              >
                <span className="flex items-center gap-4">
                  <RiCalendarTodoLine className="text-primary" /> Horarios
                </span>
                <RiArrowRightSLine
                  className={`mt-1 ${
                    activeSubmenus.includes(6) && "rotate-90"
                  } transition-all`}
                />
              </button>
              <ul
                className={` ${
                  activeSubmenus.includes(6) ? "h-[100px]" : "h-0"
                } overflow-y-hidden transition-all`}
              >
                <li>
                  <Link
                    to="/"
                    className="py-2 text-secondary-100 px-4 border-l border-gray-500 ml-6 block relative before:w-3 before:h-3 before:absolute before:bg-primary before:rounded-full before:-left-[6.5px] before:top-1/2 before:-translate-y-1/2 before:border-4 before:border-secondary-100 hover:text-primary transition-colors"
                  >
                    Calendario de actividades
                  </Link>
                </li>
                <li>
                  <Link
                    to="/"
                    className="py-2   text-secondary-100 px-4 border-l border-gray-500 ml-6 block relative before:w-3 before:h-3 before:absolute before:bg-gray-500 before:rounded-full before:-left-[6.5px] before:top-1/2 before:-translate-y-1/2 before:border-4 before:border-secondary-100 hover:text-primary transition-colors"
                  >
                    Configurar jornada
                  </Link>
                </li>
              </ul>
            </li>
            {/* Evaluaciones */}
            <li>
              <Link
                to="/tickets"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <MdOutlineAssessment className="text-primary" /> Evaluaciones
              </Link>
            </li>

            {/* Configuraciones */}
            <li>
              <Link
                to="/"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black  transition-colors"
              >
                <span className="text-primary hover:text-yellow-900">
                  <RiSettings3Line />
                </span>{" "}
                Configuraciones
              </Link>
            </li>
          </ul>
        </div>
        <nav>
          <button
            onClick={handleCerrarSesion}
            className="flex  text-secondary-100   hover:text-black items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100 transition-colors"
          >
            <RiLogoutCircleRLine className="text-primary" /> Cerrar sesión
          </button>
        </nav>
      </div>
      <button
        onClick={() => setShowMenu(!showMenu)}
        className="xl:hidden fixed bottom-4 right-4 bg-primary text-black p-3 rounded-full z-50"
      >
        {showMenu ? <RiCloseLine /> : <RiMenu3Line />}
      </button>
    </>
  );
};

export default SidebarAdministrador;
