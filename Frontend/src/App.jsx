import { useState } from "react";
import EmpleadosProvider from "./Providers/EmpleadoProvider";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Home from "./Pages/Home";
import LayoutEmpleado from "./Pages/Layouts/LayoutEmpleado";
import LayoutAuth from "./Pages/Layouts/LayoutEmpleado";
import Login from "./Pages/Login/Login";
import AuthProvider from "./Providers/AuthProvider";
import PrivateRoute from "./Pages/Layouts/PrivateRoute";


function App() {
  return (
    <AuthProvider>
      <BrowserRouter>
        <Routes>
          <Route
            path="/"
            element={
              <PrivateRoute>
                <EmpleadosProvider>
                  <LayoutEmpleado>
                    <Home />
                  </LayoutEmpleado>
                </EmpleadosProvider>
              </PrivateRoute>
            }
          />

          <Route
            path="/empleados"
            element={
              <PrivateRoute>
                <EmpleadosProvider>
                  <LayoutEmpleado>
                    <Home />
                  </LayoutEmpleado>
                </EmpleadosProvider>
              </PrivateRoute>
            }
          />

          <Route
            path="/ingresar"
            element={
              <LayoutAuth>
                <Login />
              </LayoutAuth>
            }
          />
        </Routes>
      </BrowserRouter>
    </AuthProvider>
  );
}

export default App;
