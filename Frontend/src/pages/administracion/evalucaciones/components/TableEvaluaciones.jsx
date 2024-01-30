import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useState, useMemo } from "react";
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css"; 
import axios from "axios";
import { TRANSLATIONS } from "./traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "./traduccionTableGrid";

const TableEvaluaciones = ({ evaluaciones }) => {
  const [rowData, setRowData] = useState([]);
  const [modalVerOpen, setModalVerOpen] = useState(false);

  useEffect(() => {
    setRowData(evaluaciones);
  }, [evaluaciones]);

  const colDefs = useMemo(() => [
    { headerName: "ID", field: "idEvaluacionDesempeno" },
    {
      headerName: "Nombre Completo",
      field: "idEmpleado",
      valueGetter: function (params) {
        const empleado = params.data.idEmpleado;
        return `${empleado.primerNombre} ${empleado.segundoNombre} ${empleado.primerApellido} ${empleado.segundoApellido}`;
      }
    },
    {
      headerName: "Opciones",
      cellRenderer: OptionsRenderer,
      checkboxSelection: false,
      filter: false,
      suppressMenu: true,
      width: 150,
    },
    {
      headerName: "Nombre Evaluador",
      field: "idEvaluador",
      valueGetter: function (params) {
        const evaluador = params.data.idEvaluador;
        return `${evaluador.primerNombre} ${evaluador.segundoNombre} ${evaluador.primerApellido} ${evaluador.segundoApellido}`;
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
], []);


  const defaultColDef = useMemo(() => ({
    filter: "agTextColumnFilter",
    filterParams: {
      filterOptions: ["contains"],
      defaultFilterOption: "contains",
      suppressAndOrCondition: true,
    },
    floatingFilter: true,
  }), []);

  return (
    <div className={"ag-theme-quartz"} style={{ width: "100%", height: "90%" }}>
      <AgGridReact
        localeText={TRANSLATIONS[LANGUAGE_OPTIONS.ES]}
        rowData={rowData}
        columnDefs={colDefs}
        defaultColDef={defaultColDef}
        pagination={true}
        rowSelection={"multiple"}
      />
    </div>
  );
};

const EstadoEvaluacionRenderer = (props) => {
  const { value } = props;

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

const OptionsRenderer = (props) => {
  const { data } = props.node;
  const idEvaluacionDesempeno = data.idEvaluacionDesempeno;

  const handleEliminarClick = async () => {
    try {
      const response = await axios.delete(`http://127.0.0.1:8000/api/administrador/evaluaciones-desempeno/${idEvaluacionDesempeno}`);
      console.log(`Evaluacion con id ${idEvaluacionDesempeno} eliminada`);
      
      if (response.data && response.data.message) {
        console.log(response.data.message);
      }
    } catch (error) {
      console.error(`Error al eliminar evaluacion con id ${idEvaluacionDesempeno}:`, error);
    }
  };

  return (
    <div>
      <Tippy placement="left" content="Ver Perfil del empleado">
        <button data-tippy-content="Ver" title="Ver">
          <i className="fas fa-eye mr-2 text-indigo-600"></i>
        </button>
      </Tippy>

      <Tippy placement="left" content="Editar Evaluacion">
        <button>
          <i className="fas fa-edit mr-2 text-lime-800"></i>
        </button>
      </Tippy>

      <Tippy placement="left" content="Eliminar Evaluacion">
        <button onClick={handleEliminarClick}>
          <i className="fas fa-trash-alt mr-2 text-red-600"></i>
        </button>
      </Tippy>
    </div>
  );
};

export default TableEvaluaciones;
