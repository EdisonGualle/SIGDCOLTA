import React from "react";
import IndexPerfil from "../../perfil/Index";
const ModalVerEmpleadoPerfil = ({ isOpen, onClose }) => {
  const customStyles = {
    content: {
      width: "60%", // Ajusta el ancho según tus necesidades
      height: "80%", // Ajusta la altura según tus necesidades
      margin: "auto",
      zIndex: 9999, // Establece un z-index alto
    },
  };

  return (
    <Modal
      isOpen={isOpen}
      onRequestClose={onClose}
      contentLabel="Nuevo Empleado"
      style={customStyles}
    >
      <IndexPerfil />
    </Modal>
  );
};

export default ModalVerEmpleadoPerfil;
