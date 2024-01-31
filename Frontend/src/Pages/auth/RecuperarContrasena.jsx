import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
// Icons
import { RiMailLine } from "react-icons/ri";
import useAuth from "../../hooks/useAuth";
import clienteAxios from "../../config/clienteAxios";
import Alerta from "./components/Alerta";
const RecuperarContraseña = () => {
  const [correo, setCorreo] = useState("");
  const [alerta, setAlerta] = useState({});

  const { auth, setAuth } = useAuth();

  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();

    if ([correo].includes("")) {
      setAlerta({
        msg: "Todos los campos son obligatorios",
        error: true,
      });
      return;
    }

    try {
      const { data } = await clienteAxios.post("/recuperar-contraseña", {
        correo,
      });

      console.log(data);
      if (data.success) {
        setAlerta({
          msg: `Se ha enviado un correo electronico para recuperar la contrasena, revisa tu correo electronico: ${correo}`,
          error: true,
        });
      } else {
        setAlerta({
          msg: data.msg,
          error: true,
        });
      }
    } catch (error) {
      setAlerta({
        msg: error.response.data.mensaje || "Ocurrio un error",
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
              Ovide mi <span className="text-primary">Contrasena </span>
            </h1>
            {msg && <Alerta alerta={alerta} />}
            <form className="mb-2" onSubmit={handleSubmit}>
              <div className="relative mb-8">
                <RiMailLine className="absolute top-1/2 -translate-y-1/2 left-2 text-primary" />
                <input
                  type="email"
                  className="py-3 pl-8 pr-4 bg-secondary-50 w-full outline-none rounded-lg"
                  placeholder="Correo electrónico"
                  value={correo}
                  onChange={(e) => setCorreo(e.target.value)}
                />
              </div>
              <div>
                <button
                  type="submit"
                  className="bg-primary text-black uppercase font-bold text-sm w-full py-3 px-4 rounded-lg hover:bg-yellow-400"
                >
                  Enviar instrucciones
                </button>
              </div>
            </form>
            <div className="flex flex-col items-center gap-4">
              <Link
                to="/ingresar"
                className=" text-gray-300 hover:text-primary transition-colors"
              >
                ¿Ya tienes una cuenta?
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default RecuperarContraseña;
