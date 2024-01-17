import { useState } from "react";
import EmpleadosProvider from "./Providers/EmpleadoProvider";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Home from "./Pages/Home";
import LayoutEmpleado from "./Pages/Layouts/LayoutEmpleado";
import LayoutAuth from "./Pages/Layouts/LayoutEmpleado";
import Login from "./Pages/Login";
import AuthProvider from "./Providers/AuthProvider";
import PrivateRoute from "./Pages/Layouts/PrivateRoute";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route element={<PrivateRoute />}>
          <Route
            index
            element={
              <EmpleadosProvider>
                <Home />
              </EmpleadosProvider>
            }
          />

          <Route
            path="/empleados"
            element={
              <EmpleadosProvider>
                <Home />
              </EmpleadosProvider>
            }
          />
        </Route>

        <Route element={<LayoutAuth />}>
          <Route
            path="/ingresar"
            element={
              <AuthProvider>
                <Login />
              </AuthProvider>
            }
          />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
