import { Link, useNavigate } from "react-router-dom";

function NavegacionPosicionesLaborales() {
  return (
    <>
      {/* Navbar */}
      <nav className="pb-3 text-white rounded-lg">
        <ul className="flex">
          {/* Posicion Laboral */}
          <li className="border-r border-gray-300 ">
            <Link
              to="/administracion/posiciones-laborales"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2 rounded-tl-lg rounded-bl-lg  transition"
            >
              Posiciones Laborales
            </Link>
          </li>
          {/* Direcciones */}
          <li className=" border-r  border-gray-300 ">
            <Link
              to="/administracion/direcciones"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2   transition"
            >
              Direcciones
            </Link>
          </li>
          {/* Unidades */}
          <li className="border-r  border-gray-300">
            <Link
              to="/administracion/unidades"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2  transition"
            >
              Unidades
            </Link>
          </li>
          {/* Cargos */}
          <li className="border-r  border-gray-300">
            <Link
              to="/administracion/cargos"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2  transition"
            >
              Cargos
            </Link>
          </li>
          
          {/* Jerarquia Cargos */}
          <li className="mr-6">
            <Link
              to="/administracion/jerarquia-cargos"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2 rounded-tr-lg rounded-br-lg  transition"
            >
              Jerarquia Cargos
            </Link>
          </li>

        </ul>
      </nav>
    </>
  );
}

export default NavegacionPosicionesLaborales;
