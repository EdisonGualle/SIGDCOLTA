import React, { useState } from "react";
import { Link } from "react-router-dom";
// Icons
import {
  RiBarChart2Line,
  RiEarthLine,
  RiCustomerService2Line,
  RiCalendarTodoLine,
  RiLogoutCircleRLine,
  RiArrowRightSLine,
  RiMenu3Line,
  RiCloseLine,
} from "react-icons/ri";

const Sidebar = () => {
  const [showMenu, setShowMenu] = useState(false);
  const [showSubmenu, setShowSubmenu] = useState(false);
  return (
    <>
      <div
        className={`xl:h-[100vh] overflow-y-scroll fixed xl:static w-[80%] md:w-[40%] lg:w-[30%] xl:w-auto h-full top-0 bg-secondary-900 p-4 flex flex-col justify-between z-50 ${
          showMenu ? "left-0" : "-left-full"
        } transition-all`}
      >
        <div>
          <h1 className="text-center text-2xl font-bold text-black mb-10">
            Admin<span className="text-primary text-4xl">.</span>
          </h1>
          <ul>
            <li>
              <Link
                to="/"
                className="flex text-secondary-100  items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <RiBarChart2Line className="text-primary" /> Dashboard
              </Link>
            </li>

            <li>
              <Link
                to="/tickets"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <RiCustomerService2Line className="text-primary" /> Empleados
              </Link>
            </li>
            <li>
              <Link
                to="/tickets"
                className="flex  text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100   hover:text-black transition-colors"
              >
                <RiCustomerService2Line className="text-primary" /> Permisos
              </Link>
            </li>
            <li>
              <Link
                to="/"
                className="flex text-secondary-100 items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100 hover:text-black transition-colors"
              >
                <RiCalendarTodoLine className="text-primary" /> Calendario
              </Link>
              <li>
                <button
                  onClick={() => setShowSubmenu(!showSubmenu)}
                  className="w-full flex text-secondary-100 items-center justify-between py-2 px-4 rounded-lg hover:bg-secondary-100    hover:text-black transition-colors"
                >
                  <span className="flex items-center gap-4">
                    <RiEarthLine className="text-primary" /> Configuracion
                  </span>
                  <RiArrowRightSLine
                    className={`mt-1 ${
                      showSubmenu && "rotate-90"
                    } transition-all`}
                  />
                </button>
                <ul
                  className={` ${
                    showSubmenu ? "h-[130px]" : "h-0"
                  } overflow-y-hidden transition-all`}
                >
                  <li>
                    <Link
                      to="/"
                      className="py-2 text-secondary-100 px-4 border-l border-gray-500 ml-6 block relative before:w-3 before:h-3 before:absolute before:bg-primary before:rounded-full before:-left-[6.5px] before:top-1/2 before:-translate-y-1/2 before:border-4 before:border-secondary-100 hover:text-primary transition-colors"
                    >
                      Direcciones
                    </Link>
                  </li>
                  <li>
                    <Link
                      to="/"
                      className="py-2   text-secondary-100 px-4 border-l border-gray-500 ml-6 block relative before:w-3 before:h-3 before:absolute before:bg-gray-500 before:rounded-full before:-left-[6.5px] before:top-1/2 before:-translate-y-1/2 before:border-4 before:border-secondary-100 hover:text-primary transition-colors"
                    >
                      Unidades
                    </Link>
                  </li>
                  <li>
                    <Link
                      to="/"
                      className="py-2  text-secondary-100 px-4 border-l border-gray-500 ml-6 block relative before:w-3 before:h-3 before:absolute before:bg-gray-500 before:rounded-full before:-left-[6.5px] before:top-1/2 before:-translate-y-1/2 before:border-4 before:border-secondary-100 hover:text-primary transition-colors"
                    >
                      Cargos
                    </Link>
                  </li>
                </ul>
              </li>
            </li>
          </ul>
        </div>
        <nav>
          <Link
            to="/"
            className="flex  text-secondary-100   hover:text-black items-center gap-4 py-2 px-4 rounded-lg hover:bg-secondary-100 transition-colors"
          >
            <RiLogoutCircleRLine className="text-primary" /> Cerrar sesión
          </Link>
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

export default Sidebar;
