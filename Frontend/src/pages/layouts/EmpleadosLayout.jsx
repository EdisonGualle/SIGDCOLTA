import { Navigate, Outlet } from "react-router-dom";
import useAuth from "../../hooks/useAuth";
const EmpleadosLayout = () => {
  const { auth, cargando } = useAuth();
  if (cargando) return "Cargando...";
  return (
    <>
      {auth._id ? (
        <div>
          <Outlet />
        </div>
      ) : (
        <Navigate to="/" />
      )}
    </>
  );
};

export default EmpleadosLayout;
