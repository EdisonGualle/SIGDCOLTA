import { useNavigate } from "react-router-dom";
import { useState, useEffect, createContext } from "react";
import clienteAxios from "../config/clienteAxios";

const AuthContext = createContext();

const AuthProvider = ({ children }) => {
  const [auth, setAuth] = useState();
  const [cargando, setCargando] = useState(true);

  const navigate = useNavigate();

  useEffect(() => {
    const autenticarUsuario = async () => {
      const token = localStorage.getItem("token");
      if (!token) {
        setCargando(false);
        return;
        /* return navigate("/"); */
      }
      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      try {
        //const { data } = await clienteAxios("/usuarios/perfil", config);
        const data = {
          successful: true,
          _id: 113,
          usuario: "niurkasilva",
          correo: "niurkalisseth2004@gmail.com",
          mensaje: "Inicio de sesión exitoso",
          token: "250|Di90XGxpFnlEVV5WvcyGREcyuzdrQ5tmbowZ7IBa64fb5be3",
        };
        setAuth(data);
        //navigate('/dashboard')
        console.log(data);
      } catch (error) {
        setAuth({});
      }

      setCargando(false);
    };
    autenticarUsuario();
  }, []);

  const cerrarSesionAuth = () => {
    localStorage.removeItem("token");
    setAuth({});
  };

  return (
    <AuthContext.Provider
      value={{
        auth,
        setAuth,
        cargando,
        cerrarSesionAuth,
      }}
    >
      {children}
    </AuthContext.Provider>
  );
};

export { AuthProvider };

export default AuthContext;
