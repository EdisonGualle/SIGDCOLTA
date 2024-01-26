// ModalComponent.js
import React, { useState } from "react";
import Modal from "react-modal";
import FormNuevoEmpleado from "./FormNuevoEmpleado";
import FormContrato from "./FormContrato";
import FormUbicacionDemografia from "./FormUbicacionDemografia";
import FormDatosBancarios from "./FormDatosbancarios";

const ModalComponent = ({ isOpen, onClose }) => {
  const [step, setStep] = useState(1);
  const [formData1, setFormData1] = useState({});
  const [formData2, setFormData2] = useState({});
  const [formData3, setFormData3] = useState({});
  const [formData4, setFormData4] = useState({});

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
        {step === 1 && <FormNuevoEmpleado handleNext={handleNext} />}
        {step === 2 && (
          <FormUbicacionDemografia
            handleNext={handleNext}
            handlePrev={handlePrev}
          />
        )}
        {step === 3 && (
          <FormContrato handleNext={handleNext} handlePrev={handlePrev} />
        )}
        {step === 4 && <FormDatosBancarios handlePrev={handlePrev} />}
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