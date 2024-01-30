import { Link, useNavigate } from "react-router-dom";

function NavegacionCapacitaciones() {
  return (
    <>
      {/* Navbar */}
      <nav className="pb-3 text-white rounded-lg">
        <ul className="flex">
          {/* Posicion Laboral */}
          <li className="border-r border-gray-300 ">
            <Link
              to="/administracion/capacitaciones"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2 rounded-tl-lg rounded-bl-lg  transition"
            >
              Capacitaciones
            </Link>
          </li>
          {/* Direcciones */}
          <li className=" border-r  border-gray-300 ">
            <Link
              to="/administracion/tipos-capacitaciones"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2   transition"
            >
              Tipos de capacitaciones
            </Link>
          </li>
          {/* Unidades */}
          <li className="border-r  border-gray-300">
            {/* <Link
              to="/administracion/asignar-capacitaciones"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2 rounded-tr-lg rounded-br-lg  transition"
            >
              Asignar
            </Link> */}
          </li>
          
        </ul>
      </nav>
    </>
  );
}

export default NavegacionCapacitaciones;
