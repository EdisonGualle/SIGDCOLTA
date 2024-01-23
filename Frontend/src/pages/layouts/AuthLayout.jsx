import { Outlet } from "react-router-dom";
import NavbarHome from "./components/NavbarHome";
const AuthLayout = () => {
  return (
    <>
      <main>
        <div>
        <NavbarHome transparent />
          <Outlet />
        </div>
      </main>
    </>
  );
};

export default AuthLayout;
