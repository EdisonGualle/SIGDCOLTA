import React, { useContext, useState } from "react";
import { Link, useNavigate } from "react-router-dom";

// Icons
import {
  RiMailLine,
  RiLockLine,
  RiEyeLine,
  RiEyeOffLine,
} from "react-icons/ri";

import AuthContext from "../Context/AuthContext";


const Login = () => {
  const authContext = useContext(AuthContext);
  const { loginUser, error, isAuthenticated } = authContext;
  const navigate = useNavigate();
  const [showPassword, setShowPassword] = useState(false);
  const [credenciales, setCredenciales] = useState({
    correo: "",
    password: "",
  });

  const handleChange = (e) => {
    setCredenciales({ ...credenciales, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    const response = await loginUser(
      credenciales.correo,
      credenciales.password
    );

    if (response.successful) {
      navigate("/empleados");
      // Reset form on successful login
      setCredenciales({ correo: "", password: "" });
    }
  };

  const togglePasswordVisibility = () => {
    setShowPassword(!showPassword);
  };

  const passwordIcon = showPassword ? (
    <RiEyeOffLine className="absolute top-1/2 -translate-y-1/2 right-2 hover:cursor-pointer text-primary" />
  ) : (
    <RiEyeLine className="absolute top-1/2 -translate-y-1/2 right-2 hover:cursor-pointer text-primary" />
  );

  return (
    <div className="min-h-screen flex items-center justify-center p-4">
      <div className="bg-secondary-900 p-8 rounded-xl shadow-2xl w-auto lg:w-[450px]">
        <h1 className="text-3xl text-center uppercase font-bold tracking-[5px] text-secondary-50 mb-8">
          Iniciar <span className="text-primary">sesión</span>
        </h1>
        <form className="mb-8" onSubmit={handleSubmit}>
          <div className="relative mb-4">
            <RiMailLine className="absolute top-1/2 -translate-y-1/2 left-2 text-primary" />
            <input
              type="email"
              className="py-3 pl-8 pr-4 bg-secondary-50 w-full outline-none rounded-lg"
              placeholder="Correo electrónico"
              name="correo"
              value={credenciales.correo}
              onChange={handleChange}
            />
          </div>
          <div className="relative mb-8">
            <RiLockLine className="absolute top-1/2 -translate-y-1/2 left-2 text-primary" />
            <input
              type={showPassword ? "text" : "password"}
              className="py-3 px-8 bg-secondary-50 w-full outline-none rounded-lg"
              placeholder="Contraseña"
              name="password"
              value={credenciales.password}
              onChange={handleChange}
            />
            {showPassword ? (
              <RiEyeOffLine
                onClick={() => setShowPassword(!showPassword)}
                className="absolute top-1/2 -translate-y-1/2 right-2 hover:cursor-pointer text-primary"
              />
            ) : (
              <RiEyeLine
                onClick={() => setShowPassword(!showPassword)}
                className="absolute top-1/2 -translate-y-1/2 right-2 hover:cursor-pointer text-primary"
              />
            )}
          </div>
          <div>
            <button
              type="submit"
              className="bg-primary text-black uppercase font-bold text-sm w-full py-3 px-4 rounded-lg"
            >
              Ingresar
            </button>
          </div>
        </form>
        {error.message &&
          (error.successful ? (
            <p className="text-blue-500 mb-10 flex justify-center">
              {error.message}
            </p>
          ) : (
            <p className="text-red-500 mb-10 flex justify-center">
              {error.message}
            </p>
          ))}

        <div className="flex flex-col items-center gap-4">
          <Link
            to="/olvide-contraseña"
            className=" text-gray-300 hover:text-primary transition-colors"
          >
            ¿Olvidaste tu contraseña?
          </Link>
          {/* <span className="flex items-center gap-2">
            ¿No tienes cuenta?{" "}
            <Link
              to="/registro"
              className="text-primary hover:text-gray-100 transition-colors"
            >
              Registrate
            </Link>
          </span> */}
        </div>
      </div>
    </div>
  );
};

export default Login;
