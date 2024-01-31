import React from "react";
import { Calendar, dayjsLocalizer } from "react-big-calendar";
import dayjs from "dayjs";
import "react-big-calendar/lib/css/react-big-calendar.css";
import JornadaIndex from "../jornada/JornadaIndex";

// Lista de eventos
const events = [
  {
    title: "Reunión importante",
    start: new Date(2024, 0, 30, 10, 0),
    end: new Date(2024, 0, 30, 12, 0),
  },
  // Agrega más eventos según tus necesidades
];

const CalendarioIndex = ({ events }) => {
  const localizer = dayjsLocalizer(dayjs);

  return (
    <div className="bg-white p-5 rounded-md shadow-lg">
      <div className="w-1/2 my-10">
        <h1>SELECION DE RANGO DE FECHAS PARA AGREGAR UNA JORNADA</h1>
        <JornadaIndex />
        <button className="mt-3 bg-yellow-500 px-2 py-2 roundad-md text-white font-bold hover:bg-yellow-600">Agregar Actividades</button>
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
        eventPropGetter={(event, start, end, isSelected) => {
          const style = {
            backgroundColor: isSelected ? "#3174ad" : "#428bca",
            borderRadius: "0px",
            opacity: 0.8,
            color: "#fff",
            border: "0px",
            display: "block",
          };
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
      />
    </div>
  );
};

export default CalendarioIndex;
