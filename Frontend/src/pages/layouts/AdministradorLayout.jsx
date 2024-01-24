import { Navigate, Outlet } from "react-router-dom";
import useAuth from "../../hooks/useAuth";
import HeaderAdministrador from "./components/HeaderAdministrador";
import SidebarAdministrador from "./components/SidebarAdministrador";
const AdministradorLayout = () => {
  const { auth, cargando } = useAuth();
  if (cargando) return "Cargando...";
  return (
    <>
      {auth._id ? (
        <div className="min-h-screen grid grid-cols-1 xl:grid-cols-6">
          <SidebarAdministrador  />
          <div className="xl:col-span-5">
            <HeaderAdministrador auth={auth}/>
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

export default AdministradorLayout;
