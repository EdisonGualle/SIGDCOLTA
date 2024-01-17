import React, { useContext } from "react";
import { Navigate, Outlet } from "react-router-dom";
import Header from "../Components/Header";
import Footer from "../Components/Footer";
import AuthContext from "../../Context/AuthContext";

const LayoutEmpleado = () => {
  const { isAuthenticated } = useContext(AuthContext);
  if (isAuthenticated) {
    return <Navigate to="/" />;
  } else {
    return (
      <div>
        <Header />

        <Outlet />

        <Footer />
      </div>
    );
  }
};

export default LayoutEmpleado;
