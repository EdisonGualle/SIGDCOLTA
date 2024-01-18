import { BrowserRouter, Routes, Route } from "react-router-dom";
import { AuthProvider } from "./context/AuthProvider";
import AuthLayout from "./layouts/AuthLayout";
import RutaProtegida from "./layouts/RutaProtegida";
import Login from "./Pages/Login";
import Dashboard from "./Pages/Dashboard";
import Empleados from "./Pages/Empleados";
import { EmpleadosProvider } from "./context/EmpleadosProvider";

function App() {
  return (
    <BrowserRouter>
      <AuthProvider>
        <EmpleadosProvider>
          <Routes>
            <Route path="/" element={<AuthLayout />}>
              <Route index element={<Login />} />
            </Route>

            <Route path="/" element={<RutaProtegida />}>
              <Route path="/dashboard" element={<Dashboard />} />
              <Route path="/empleados" element={<Empleados />} />
            </Route>
          </Routes>
        </EmpleadosProvider>
      </AuthProvider>
    </BrowserRouter>
  );
}

export default App;
