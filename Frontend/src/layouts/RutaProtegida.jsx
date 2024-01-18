import { Outlet, Navigate } from "react-router-dom";
import useAuth from "../hooks/useAuth";
import Header from "../components/Header";
import Sidebar from "../components/Sidebar";

const RutaProtegida = () => {
  const { auth, cargando } = useAuth({});
  if (cargando) return "Cargando...";
  return (
    <>
      {auth._id ? (
        <div className="min-h-screen grid grid-cols-1 xl:grid-cols-6">
          <Sidebar />
          <div className="xl:col-span-5">
            <Header />
            <div className="h-[90vh] overflow-y-scroll p-8">
              <Outlet />
            </div>
          </div>
        </div>
      ) : (
        <Navigate to="/" />
      )}
    </>
  );
};

export default RutaProtegida;
