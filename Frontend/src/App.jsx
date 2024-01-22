import { BrowserRouter, Route, Routes } from "react-router-dom";
import { AuthProvider } from "./providers/AuthProvider";
import AuthLayout from "./pages/layouts/AuthLayout";
import HomeLayout from "./pages/layouts/HomeLayout";
import EmpleadosLayout from "./pages/layouts/EmpleadosLayout";
import AdministradorLayout from "./pages/layouts/AdministradorLayout";
import Home from "./pages/Home";
import Login from "./pages/auth/Login";
import HomeEmpleados from "./pages/empleados/Home";
import DashboardAdministrador from "./pages/administracion/Dashboard";
import IndexEmpleadosAdministrador from "./pages/administracion/empleados/Index";
import IndexPermisosAdministrador from "./pages/administracion/permisos/Index";
import { EmpleadosProvider } from "./providers/EmpleadosProvider";
import NotFound from "./pages/NotFound";

import IndexDireccionesAdministrador from "./pages/administracion/direcciones/Index";
import { DireccionesProvider } from "./providers/DireccionesProvider";

function App() {
  return (
    <BrowserRouter>
      <AuthProvider>
        <EmpleadosProvider>
        <DireccionesProvider>
          <Routes>
            {/* RUTAS PARA PAGINA DE INICIO SISTEMA */}
            <Route path="/" element={<HomeLayout />}>
              <Route index element={<Home />} />
              <Route path="*" element={<NotFound />} />
            </Route>

            {/* RUTAS PARA LOGEO ETC */}
            <Route path="/" element={<AuthLayout />}>
              <Route path="login" element={<Login />} />
            </Route>

            {/* RUTAS DE EMPLEADOS REQUIEREN AUTENTICACION */}
            <Route path="/empleados" element={<EmpleadosLayout />}>
              <Route index element={<HomeEmpleados />} />
            </Route>

            {/* RUTAS DEL ADMINISTRADOR REQUIEREN AUTENTICACION */}
            <Route path="/administracion" element={<AdministradorLayout />}>
              <Route index element={<DashboardAdministrador />} />
              <Route path="empleados" element={<IndexEmpleadosAdministrador />} />
              <Route path="permisos" element={<IndexPermisosAdministrador />} />
              <Route path="direcciones" element={<IndexDireccionesAdministrador />} />
            </Route>
          </Routes>
          </DireccionesProvider>
        </EmpleadosProvider>
      </AuthProvider>
    </BrowserRouter>
  );
}

export default App;
