import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS } from "./traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "./traduccionTableGrid";
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css"; // optional

const TableEvaluaciones = ({ evaluaciones }) => {
  const [rowData, setRowData] = useState([]);
  const [modalVerOpen, setModalVerOpen] = useState(false);
  const handleNuevoClick = () => {
    setModalVerOpen(true);
  };

  const handleCloseModal = () => {
    setModalOpen(false);
  };
  // Fetch data & update rowData state
  useEffect(() => {
    setRowData(evaluaciones);
  }, [evaluaciones]);

  // Column Definitions: Defines & controls grid columns.
  const [colDefs] = useState([
    {
      headerName: "ID Empleado",
      field: "idEmpleado",
      valueGetter: function(params) {
        return params.data.idEmpleado.id;
      },
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
    },
    {
      headerName: "Nombre Competo",
      field: "idEmpleado",
      valueGetter: function(params) {
        return params.data.idEmpleado.primerNombre + ' ' + 
               params.data.idEmpleado.segundoNombre + ' ' + 
               params.data.idEmpleado.primerApellido + ' ' + 
               params.data.idEmpleado.segundoApellido;
      },
    },

    {
      headerName: "Opciones",
      cellRenderer: OptionsRenderer,
      checkboxSelection: false, // Evita que la columna sea seleccionable
      filter: false, // Evita que la columna tenga funcionalidad de búsqueda
      suppressMenu: true,
      width: 150,
    },

    {
      headerName: "Nombre Evaluador",
      field: "idEvaluador",
      valueGetter: function(params) {
        return params.data.idEvaluador.primerNombre + ' ' + 
               params.data.idEvaluador.segundoNombre + ' ' + 
               params.data.idEvaluador.primerApellido + ' ' + 
               params.data.idEvaluador.segundoApellido;
      },
      suppressMenu: true,
    },
    {
      headerName: "Fecha de Evaluacion",
      field: "fechaEvaluacion",
      filter: "agDateColumnFilter",
      suppressMenu: true,
    },
    {
      headerName: "Estado de Evaluación",
      field: "estadoEvaluacion",
      cellRenderer: EstadoEvaluacionRenderer,
    },
    { headerName: "Objetivos/Metas", field: "ObjetivosMetas" },
    { headerName: "Cumplimiento de Objetivos", field: "cumplimientoObjetivos" },
    { headerName: "Competencias", field: "competencias" },
    { headerName: "Calificación General", field: "calificacionGeneral" },
    { headerName: "Comentarios", field: "comentarios" },
    { headerName: "Áreas de Mejora", field: "areasMejora" },
    { headerName: "Reconocimientos/Logros", field: "reconocimientosLogros" },
    { headerName: "Desarrollo Profesional", field: "desarrolloProfesional" },
    { headerName: "Feedback del Empleado", field: "feedbackEmpleado" },

  ]);



  // Apply settings across all columns
  const defaultColDef = useMemo(
    () => ({
      filter: "agTextColumnFilter",
      filterParams: {
        filterOptions: ["contains"],
        defaultFilterOption: "contains",
        suppressAndOrCondition: true,
      },
      floatingFilter: true,
    }),
    []
  );

  // Definir el renderer personalizado para la columna de opciones
  const frameworkComponents = {
    optionsRenderer: OptionsRenderer,
  };
  return (
    <div className={"ag-theme-quartz"} style={{ width: "100%", height: "90%" }}>
      <AgGridReact
        localeText={TRANSLATIONS[LANGUAGE_OPTIONS.ES]}
        rowData={rowData}
        columnDefs={colDefs}
        defaultColDef={defaultColDef}
        frameworkComponents={frameworkComponents}
        pagination={true}
        rowSelection={"multiple"}
      />
    </div>
  );
};
const EstadoEvaluacionRenderer = (props) => {
  const { value } = props;

  // Determina qué icono mostrar según el estado de la evaluación
  const getIconByState = (estado) => {
    switch (estado) {
      case 'Aprobada':
        return <i className="fas fa-check-circle text-green-500"></i>;
      case 'Pendiente':
        return <i className="fas fa-clock text-yellow-500"></i>;
      case 'Rechazada':
        return <i className="fas fa-times-circle text-red-500"></i>;
      default:
        return null;
    }
  };

  return (
    <div>
      {getIconByState(value)}&nbsp;
      <span>{value}</span>
      
    </div>
  );
};

// Nuevo componente para renderizar las opciones en la columna correspondiente
const OptionsRenderer = (props) => {
  const { data } = props.node;



  const handleVerClick = () => {
    // Lógica para ver el empleado
    console.log("Ver empleado:", data);
  };

  const handleEditarClick = () => {
    // Lógica para editar el empleado
    console.log("Editar empleado:", data);
  };

  const handleEliminarClick = () => {
    // Lógica para eliminar el empleado
    console.log("Eliminar empleado:", data);
  };



  return (
    <div>
      <Tippy placement="left" content="Ver Perfil del empleado">
        <button data-tippy-content="Ver" title="Ver">
          <i className="fas fa-eye mr-2 text-indigo-600"></i>
        </button>
      </Tippy>

      <Tippy placement="left" content="Editar informacion del empleado">
        <button>
          <i className="fas fa-edit mr-2 text-lime-800"></i>
        </button>
      </Tippy>

      <Tippy placement="left" content="Eliminar Empleados">
        <button>
          <i className="fas fa-trash-alt mr-2 text-red-600"></i>
        </button>
      </Tippy>
     

    </div>
  );
};
export default TableEvaluaciones;
