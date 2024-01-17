// PrivateRoute.js
import React, { useContext } from "react";
import { Navigate, Outlet } from "react-router-dom";
import AuthContext from "../../Context/AuthContext";

const PrivateRoute = () => {
  const { isAuthenticated } = useContext(AuthContext);
  if (!isAuthenticated) {
    return <Navigate to="/ingresar" />;
  }
  return <Outlet />;
};

export default PrivateRoute;
