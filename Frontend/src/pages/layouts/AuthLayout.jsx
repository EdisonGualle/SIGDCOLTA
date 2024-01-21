import { Outlet } from "react-router-dom";
const AuthLayout = () => {
  return (
    <>
      <main>
        <div>
          <h1>LAYAOUT DE AUTENTICACIONES</h1>
          <Outlet />
        </div>
      </main>
    </>
  );
};

export default AuthLayout;
