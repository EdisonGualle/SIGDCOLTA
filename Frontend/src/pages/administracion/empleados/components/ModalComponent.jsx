// ModalComponent.js
import React, { useState } from "react";
import Modal from "react-modal";
import FormNuevoEmpleado from "./FormNuevoEmpleado";
import FormContrato from "./FormContrato";
import FormUbicacionDemografia from "./FormUbicacionDemografia";
import FormDatosBancarios from "./FormDatosbancarios";
import useEmpleados from "../../../../hooks/useEmpleados";

const ModalComponent = ({ isOpen, onClose }) => {
  const {agregarEmpleado}=useEmpleados();
  const [step, setStep] = useState(1);
  const [formDatosPersonales, setFormDatosPersonales] = useState({
    cedula: "",
    correo: "",
    primerNombre: "",
    segundoNombre: "",
    primerApellido: "",
    segundoApellido: "",
    genero: "Masculino",
    estadoCivil: "Soltero",
    tipoSangre: "A+",
    telefonoTrabajo: "",
    telefonoPersonal: "",
  });
  const [formDemografia, setFormDemografia] = useState({
    etnia: "Mestizo",
    nacionalidad: "Ecuatoriano",
    fechaNacimiento: "",
    id_provincia: "",
    id_canton: "",
    fechaNacimiento: "",
  });
  const [formContrato, setFormContrato] = useState({
    idDireccion: "",
    idUnidad: "",
    idCargo: "",
    fechaInicio: "",
    fechaFin: "",
    //    idEmpleado: "",
    idTipoContrato: "",
    archivo: null,
    salario: "",
    estadoContrato: "Activo",
  });
  const [formDatosBancarios, setFormDatosBancarios] = useState({
    nombreBanco: "",
    numeroCuenta: "",
    tipoCuenta: "",
  });

  const completarFormulario = () => {
    const newEmpleado = {
      cedula: formDatosPersonales.cedula,
      correo: formDatosPersonales.correo,
      primerNombre: formDatosPersonales.primerNombre,
      segundoNombre: formDatosPersonales.segundoNombre,
      primerApellido: formDatosPersonales.primerApellido,
      segundoApellido: formDatosPersonales.segundoApellido,
      genero: formDatosPersonales.genero,
      estadoCivil: formDatosPersonales.estadoCivil,
      telefonoTrabajo: formDatosPersonales.telefonoTrabajo,
      telefonoPersonal: formDatosPersonales.telefonoPersonal,
      fechaNacimiento: formDemografia.fechaNacimiento,
      etnia: formDemografia.etnia,
      tipoSangre: formDatosPersonales.tipoSangre,
      nacionalidad: formDemografia.nacionalidad,
      id_canton: formDemografia.id_canton,
      id_provincia: formDemografia.id_provincia,
      idCargo: formContrato.idCargo,
    };
    console.log(newEmpleado);
    agregarEmpleado(newEmpleado);
  };

  const handleNext = () => {
    // Realizar validación específica para cada paso
    switch (step) {
      case 1:
        // Validar el formulario 1 si es necesario
        // Puedes utilizar librerías como Formik o validar manualmente aquí
        setStep(2);
        break;
      case 2:
        // Validar el formulario 2
        setStep(3);
        break;
      case 3:
        // Validar el formulario 3
        setStep(4);
        break;
      case 4:
        // Validar el formulario 4 o realizar la lógica final
        // Puedes realizar la lógica de envío de datos o lo que sea necesario
        onClose();
        break;
      default:
        break;
    }
  };

  const handlePrev = () => {
    setStep(step - 1);
  };

  const customStyles = {
    content: {
      width: "60%", // Ajusta el ancho según tus necesidades
      height: "80%", // Ajusta la altura según tus necesidades
      margin: "auto",
      zIndex: 9999, // Establece un z-index alto
    },
  };

  const renderStepIndicator = () => {
    return (
      <div className="flex justify-around mb-4">
        <StepIndicator step={1} title="Datos Personales" currentStep={step} />
        <StepIndicator
          step={2}
          title="Ubicación y Demografia"
          currentStep={step}
        />
        <StepIndicator
          step={3}
          title="Detalles del Contrato"
          currentStep={step}
        />
        <StepIndicator step={4} title="Datos Bancarios" currentStep={step} />
      </div>
    );
  };

  return (
    <Modal
      isOpen={isOpen}
      onRequestClose={onClose}
      contentLabel="Nuevo Empleado"
      style={customStyles}
    >
      <div>
        <h1 className="text-center text-3xl font-bold mb-1">NUEVO EMPLEADO</h1>
        <hr className="mb-5"></hr>
        {renderStepIndicator()}
        {step === 1 && (
          <FormNuevoEmpleado
            formDatosPersonales={formDatosPersonales}
            setFormDatosPersonales={setFormDatosPersonales}
            handleNext={handleNext}
          />
        )}
        {step === 2 && (
          <FormUbicacionDemografia
            setFormDemografia={setFormDemografia}
            formDemografia={formDemografia}
            handleNext={handleNext}
            handlePrev={handlePrev}
          />
        )}
        {step === 3 && (
          <FormContrato
            formContrato={formContrato}
            setFormContrato={setFormContrato}
            handleNext={handleNext}
            handlePrev={handlePrev}
          />
        )}
        {step === 4 && (
          <FormDatosBancarios
            formDatosbancarios={formDatosBancarios}
            setFormDatosBancarios={setFormDatosBancarios}
            handlePrev={handlePrev}
            completarFormulario={completarFormulario}
          />
        )}
      </div>
    </Modal>
  );
};

const StepIndicator = ({ step, title, currentStep }) => {
  const stepClassName = `rounded-full h-12 w-12 flex items-center justify-center ${
    currentStep === step
      ? "bg-blue-500 text-white"
      : "bg-gray-300 text-gray-600"
  }`;

  return (
    <div className="flex items-center flex-col">
      <div className={stepClassName}>{step}</div>
      <div className="mt-1 text-sm">{title}</div>
    </div>
  );
};

export default ModalComponent;
