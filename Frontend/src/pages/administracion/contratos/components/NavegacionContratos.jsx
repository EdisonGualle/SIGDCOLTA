import { Link, useNavigate } from "react-router-dom";

function NavegacionContratos() {
  return (
    <>
      {/* Navbar */}
      <nav className="pb-3 text-white rounded-lg">
        <ul className="flex">
          {/* Todos los Contratos */}
          <li className="border-r border-gray-300 ">
            <Link
              to="/administracion/contratos"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2 rounded-tl-lg rounded-bl-lg  transition"
            >
              Todos
            </Link>
          </li>
          {/* Tipos de Contratos */}
          <li className=" border-r  border-gray-300 ">
            <Link
              to="/administracion/tipos-contratos"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2   transition"
            >
              Tipos
            </Link>
          </li>
          {/* Asignar Contratos */}
          <li className="border-r  border-gray-300">
            <Link
              to="/administracion/asignar-contratos"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2  transition"
            >
              Asignar
            </Link>
          </li>
  
        </ul>
      </nav>
    </>
  );
}

export default NavegacionContratos;
