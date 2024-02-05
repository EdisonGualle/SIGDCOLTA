import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { AgGridReact } from "ag-grid-react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css";
import axios from "axios";
import Swal from 'sweetalert2';

const OptionsRenderer = (props) => {
  const { data } = props.node;
  const idContrato = data.idContrato;
  const handleEliminarClick = async () => {
    // Mostrar SweetAlert2 para confirmar la eliminación
    const confirmacion = await Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción no se puede revertir',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar el Contrato'
    });

    if (confirmacion.isConfirmed) {
      try {
        const token = localStorage.getItem("token");
        if (!token) {
          // Maneja la situación donde el token no está disponible en localStorage
          return;
        }

        const config = {
          headers: {
            Authorization: `Bearer ${token}`
          }
        };

        const response = await axios.delete(`http://127.0.0.1:8000/api/administrador/contratos/${idContrato}`, config);
        console.log(`Evaluacion con id ${idContrato} eliminada`);

        // Mostrar SweetAlert2 con mensaje de éxito
        Swal.fire(
          '¡Eliminada!',
          'El Contrato ha sido eliminada.',
          'success'
        ).then(() => {
          window.location.reload();
        });

        if (response.data && response.data.message) {
          console.log(response.data.message);
        }
      } catch (error) {
        console.error(`Error al eliminar evaluacion con id ${idContrato}:`, error);
        // Mostrar SweetAlert2 con mensaje de error
        Swal.fire(
          'Error',
          'Hubo un error al intentar eliminar el Contrato',
          'error'
        );
      }
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


const TableContratos = ({ contratos }) => {
  const [rowData, setRowData] = useState([]);

  useEffect(() => {
    // Transformar datos si es necesario
    const transformedContratos = contratos ? contratos.map((contrato) => ({
      ...contrato,
      nombreCompleto: `${contrato.primerNombre} ${contrato.segundoNombre} ${contrato.primerApellido} ${contrato.segundoApellido}`,
    })) : [];


    setRowData(transformedContratos);
  }, [contratos]);

  // Column Definitions
  const [colDefs] = useState([
    { headerName: "ID", field: "idContrato" },
    {
      headerName: "Nombre", field: "nombreCompleto",
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
    },
    {
      headerName: "Opciones",
      cellRenderer: OptionsRenderer,
      checkboxSelection: false,
      filter: false,
      suppressMenu: true,
      width: 150,
    },
    { headerName: "Estado de Contrato", field: "estadoContrato",
    cellRenderer: EstadoContratoRenderer},
    {
      headerName: "Fecha de Inicio", field: "fechaInicio",
      filter: "agDateColumnFilter",
      suppressMenu: true,
    },
    {
      headerName: "Fecha de Fin", field: "fechaFin",
      filter: "agDateColumnFilter",
      suppressMenu: true,
    },
    { headerName: "Tipo de Contrato", field: "tipoContratoNombre" },
    { headerName: "Archivo", field: "archivo" },
    { headerName: "Salario", field: "salario" },
    
  ]);

  // Fetch data & update rowData state

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
 

  
  return (
    <div className="h-full">
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
      <div id="myChart" className="ag-theme-quartz my-chart"></div>
    </div>
  );
};
const EstadoContratoRenderer = (props) => {
  const { value } = props;

  const getIconByState = (estado) => {
    switch (estado) {
      case 'activo':
        return <i className="fas fa-check-circle text-green-500"></i>;
      case 'inactivo':
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


export default TableContratos;