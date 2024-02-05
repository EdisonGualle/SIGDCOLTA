import { Outlet } from "react-router-dom";
import NavbarHome from "./components/NavbarHome";
import FooterHome from "./components/FooterHome";
const HomeLayout = () => {
  return (
    <>
      <main>
        <NavbarHome transparent />
        <Outlet />
        <FooterHome />
      </main>
    </>
  );
};

export default HomeLayout;
