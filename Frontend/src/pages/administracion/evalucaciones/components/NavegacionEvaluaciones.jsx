import { Link, useNavigate } from "react-router-dom";

function NavegacionEvaluaciones() {
  return (
    <>
      {/* Navbar */}
      <nav className="pb-3 text-white rounded-lg">
        <ul className="flex">
          {/* Posicion Laboral */}
          <li className="border-r border-gray-300 ">
            <Link
              to="/administracion/evaluaciones"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2 rounded-tl-lg rounded-bl-lg  transition"
            >
              Todos
            </Link>
          </li>
          {/* Direcciones */}
          <li className=" border-r  border-gray-300 ">
            <Link
              to="/administracion/sin-evaluaciones"
              className="bg-gray-800 hover:bg-gray-500 text-white p-2   transition"
            >
              Sin Evaluar
            </Link>
          </li>
          
          

        </ul>
      </nav>
    </>
  );
}

export default NavegacionEvaluaciones;
