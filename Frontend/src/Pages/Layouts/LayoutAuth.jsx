import React from "react";
import { Outlet } from "react-router-dom";

const LayoutAuth = () => {
  return (
    <div>
      <Outlet />
    </div>
  );
};

export default LayoutAuth;
