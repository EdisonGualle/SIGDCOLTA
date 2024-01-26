import React, { useState } from "react";
import Modal from "react-modal";
import IndexPerfil from "../../perfil/Index";
import PerfilEmpleado from "./PerfilEmpleado";
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css"; // optional

const OptionsRenderer = (props) => {
  const { data } = props;
  const [modalIsOpen, setModalIsOpen] = useState(false);
  const customStyles = {
    content: {
      width: "80%", // Ajusta el ancho según tus necesidades
      height: "80%", // Ajusta la altura según tus necesidades
      margin: "auto",
      marginLeft: "15%",
      zIndex: 9999, // Establece un z-index alto
    },
  };
  const onVerClick = () => {
    setModalIsOpen(true);
  };

  const closeModal = () => {
    setModalIsOpen(false);
  };
  const onEditarClick = (data) => {
    console.log(data);
  };
  const onEliminarClick = (data) => {
    console.log(data);
  };

  return (
    <>
      <div>
        <Tippy placement="left" content="Ver Perfil del empleado">
          <button
            onClick={() => onVerClick(data)}
            data-tippy-content="Ver"
            title="Ver"
          >
            <i className="fas fa-eye mr-2 text-indigo-600"></i>
          </button>
        </Tippy>

        <Tippy placement="left" content="Editar informacion del empleado">
          <button onClick={() => onEditarClick(data)}>
            <i className="fas fa-edit mr-2 text-lime-800"></i>
          </button>
        </Tippy>

        <Tippy placement="left" content="Eliminar Empleados">
          <button onClick={() => onEliminarClick(data)}>
            <i className="fas fa-trash-alt mr-2 text-red-600"></i>
          </button>
        </Tippy>
      </div>

      <Modal
        isOpen={modalIsOpen}
        onRequestClose={closeModal}
        contentLabel="Ver Empleado Modal"
        style={customStyles}
      >
        {/* Contenido del modal */}
        <PerfilEmpleado empleado={data} />
        <button onClick={closeModal}>Cerrar</button>
      </Modal>
    </>
  );
};

export default OptionsRenderer;
