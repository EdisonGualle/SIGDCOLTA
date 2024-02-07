import React, { useState, useEffect } from "react";
import { Calendar, dayjsLocalizer } from "react-big-calendar";
import dayjs from "dayjs";
import withReactContent from "sweetalert2-react-content";
import "react-big-calendar/lib/css/react-big-calendar.css";
import JornadaIndex from "../jornada/JornadaIndex";
import es from "dayjs/locale/es"; // Importar el locale español
import Swal from "sweetalert2";
import FormularioCalendarioMensual from "./FormularioCalendarioMensual";

const API_URL = "http://localhost:8000/api/calendario_actividades_gad";

const CalendarioIndex = () => {
  const [events, setEvents] = useState([]);

  useEffect(() => {
    const fetchEvents = async () => {
      try {
        const response = await fetch(API_URL);
        if (!response.ok) {
          throw new Error("Error al obtener eventos");
        }
        const data = await response.json();
        setEvents(
          data.actividades.map((evento) => ({
            id: evento.idCalendario,
            title: evento.descripcion_actividad,
            start: new Date(evento.fecha + "T06:00:00"),
            end: new Date(evento.fecha + "T18:00:00"),
            tipoDia: evento.tipoDia,
          }))
        );
      } catch (error) {
        console.error(error);
        // Manejar el error de manera adecuada (por ejemplo, mostrar un mensaje al usuario)
      }
    };
    fetchEvents();
  }, []);

  const MySwal = withReactContent(Swal);

  const localizer = dayjsLocalizer(dayjs, es);

  const handleRegistrarJornada = () => {
    MySwal.fire({
      title: "Registrar Jornada Mensual",
      html: <FormularioCalendarioMensual />,
      showCancelButton: true,
      cancelButtonText: "Cerrar",
      showConfirmButton: false,
    });
  };

  return (
    <div className="bg-white p-5 rounded-md shadow-lg">
      <div className="w-1/2 my-10">
        <h1>SELECCIÓN DE RANGO DE FECHAS PARA AGREGAR UNA JORNADA</h1>
        <button
          className="mt-3 bg-yellow-500 px-2 py-2 rounded-md text-white font-bold hover:bg-yellow-600"
          onClick={handleRegistrarJornada}
        >
          Registrar Jornada Mensual
        </button>
      </div>
      <Calendar
        localizer={localizer}
        startAccessor="start"
        endAccessor="end"
        events={events}
        style={{ height: 500 }}
        messages={{
          today: "Hoy",
          next: "Siguiente",
          previous: "Anterior",
          month: "Mes",
          week: "Semana",
          day: "Día",
        }}
        eventPropGetter={(event) => {
          let style = {
            borderRadius: "0px",
            opacity: 0.8,
            color: "#fff",
            border: "0px",
            display: "block",
          };

          switch (event.tipoDia) {
            case "normal":
              style.backgroundColor = "#4CAF50"; // verde
              break;
            case "jornadaUnica":
              style.backgroundColor = "#4c2882"; // amarillo
              break;
            case "feriado":
              style.backgroundColor = "#FF5733"; // rojo
              break;
            default:
              break;
          }

          return { style };
        }}
        onSelectEvent={(event, e) => {
          console.log("Evento clicado:", event);
          // Puedes agregar aquí la lógica para manejar el clic en el evento
        }}
        formats={{
          dateFormat: "D",
          dayFormat: (date, culture, localizer) =>
            localizer.format(date, "dddd", culture),
        }}
        onNavigate={(date, view) => {
          console.log("Navegación a:", date, "Vista actual:", view);
          // Puedes agregar aquí la lógica para manejar la navegación
        }}
        onView={(view) => {
          console.log("Vista cambiada a:", view);
          // Puedes agregar aquí la lógica para manejar el cambio de vista
        }}
        min={new Date(0, 0, 0, 6, 0, 0)}
        max={new Date(0, 0, 0, 20, 0, 0)}
      />
    </div>
  );
};

export default CalendarioIndex;
