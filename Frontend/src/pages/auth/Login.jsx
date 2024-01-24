import { useEffect, useState } from "react";
import clienteAxios from "../../config/clienteAxios";
import { Link, useNavigate } from "react-router-dom";
import useAuth from "../../hooks/useAuth";
import Alerta from "./components/Alerta";

// Icons
import {
  RiMailLine,
  RiLockLine,
  RiEyeLine,
  RiEyeOffLine,
} from "react-icons/ri";

const Login = () => {
  const [correo, setCorreo] = useState("");
  const [password, setPassword] = useState("");
  const [alerta, setAlerta] = useState({});

  const { auth, setAuth } = useAuth();

  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();

    if ([correo, password].includes("")) {
      setAlerta({
        msg: "Todos los campos son obligatorios",
        error: true,
      });
      return;
    }

    try {
      const { data } = await clienteAxios.post("/ingresar", {
        correo,
        password,
      });
      setAlerta({});
      localStorage.setItem("token", data.token);
      setAuth(data);
      navigate("/administracion/empleados");
    } catch (error) {
      setAlerta({
        msg: error.response.data.mensaje,
        error: true,
      });
    }
  };

  const { msg } = alerta;

  return (
    <div className="absolute w-full h-full">
      <div
        className="absolute top-0 w-full h-full bg-gray-900"
        style={{
          backgroundImage:
            "url(https://img.freepik.com/premium-vector/futuristic-background-style_23-2148503794.jpg)",
          backgroundSize: "100%",
          backgroundRepeat: "no-repeat",
        }}
      >
        <div className="min-h-screen flex items-center justify-center p-4">
          <div className="bg-secondary-900 p-8 rounded-xl shadow-2xl w-auto lg:w-[450px]">
            <h1 className="text-3xl text-center uppercase font-bold tracking-[5px] text-secondary-50 mb-8">
              Iniciar <span className="text-primary">sesión</span>
            </h1>
            {msg && <Alerta alerta={alerta} />}
            <form className="mb-2" onSubmit={handleSubmit}>
              <div className="relative mt-1 mb-4">
                <RiMailLine className="absolute top-1/2 -translate-y-1/2 left-2 text-yellow-500" />
                <input
                  id="correo"
                  type="email"
                  placeholder="Correo electrónico"
                  className="py-3 pl-8 pr-4 bg-secondary-50 w-full outline-none rounded-lg"
                  value={correo}
                  onChange={(e) => setCorreo(e.target.value)}
                />
              </div>
              <div className="relative mb-8">
                <RiLockLine className="absolute top-1/2 -translate-y-1/2 left-2 text-yellow-500" />
                <input
                  id="password"
                  type="password"
                  placeholder="Contraseña"
                  className="py-3 px-8 bg-secondary-50 w-full outline-none rounded-lg"
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                />
              </div>

              <input
                type="submit"
                value="Ingresar"
                className="bg-primary mb-5 w-full py-3 text-black text-sm uppercase font-bold rounded-lg hover:cursor-pointer hover:bg-yellow-500 transition-colors"
              />
            </form>
            <div className="flex flex-col items-center gap-4">
              <Link
                to="/recuperar-contraseña"
                className=" text-gray-300 hover:text-primary transition-colors"
              >
                ¿Olvidaste tu contraseña?
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Login;
