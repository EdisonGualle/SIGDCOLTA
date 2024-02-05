import React, { useEffect, useState } from "react";
import { AgGridReact } from "ag-grid-react";
import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-alpine.css";

import OptionsRenderer from "./OptionsRenderer";
const TableEmpleados = ({ empleados }) => {
  const [rowData, setRowData] = useState([]);

  useEffect(() => {
    setRowData(empleados);
  }, [empleados]);

  const [gridOptions] = useState({
    suppressClickEdit: true,
    onCellEditingStarted: (event) => {
      // Accede a los datos actuales de la fila
      const currentData = event.api.getRowNode(event.rowIndex).data;
    },
    onCellClicked: handleCellClicked,
    onRowEditingStarted: handleRowEditingStarted,
    onRowEditingStopped: handleRowEditingStopped,
    editType: "fullRow",
    columnDefs: [
      {
        field: "cedula",
        headerName: "cedula",
        minWidth: 150,
        editable: true,
        suppressMenu: true,
        checkboxSelection: true,
        headerCheckboxSelection: true,
        chartDataType: "category",
      },
      {
        headerName: "Acciones",
        minWidth: 150,
        cellRenderer: OptionsRenderer,
        editable: false,
        colId: "acciones",
        checkboxSelection: false,
        filter: false,
        pinned: "right",
      },

      {
        headerName: "1er Nombre",
        field: "primerNombre",
        suppressMenu: true,
      },
      {
        headerName: "2do Nombre",
        field: "segundoNombre",
        suppressMenu: true,
      },
      {
        headerName: "1er Apellido",
        field: "primerApellido",
        suppressMenu: true,
      },
      {
        headerName: "2do Apellido",
        field: "segundoApellido",
        suppressMenu: true,
      },

      {
        headerName: "Estado",
        field: "tipoEstado",
        suppressMenu: true,
      },

      /* {
        headerName: "Nombre Completo",
        suppressMenu: true,
        valueGetter: (params) =>
          `${params.data.primerNombre} ${params.data.segundoNombre} ${params.data.primerApellido} ${params.data.segundoApellido}`,
      }, */

      {
        headerName: "Fecha de Nacimiento",
        field: "fechaNacimiento",
        filter: "agDateColumnFilter",
        suppressMenu: true,
      },
      { headerName: "Correo", field: "correo", suppressMenu: true },
      { headerName: "Genero", field: "genero", suppressMenu: true },
      {
        headerName: "Teléfono Personal",
        field: "telefonoPersonal",
        suppressMenu: true,
      },
      {
        headerName: "Teléfono Trabajo",
        field: "telefonoTrabajo",
        suppressMenu: true,
      },
      { headerName: "Etnia", field: "etnia", suppressMenu: true },
      { headerName: "Estado Civil", field: "estadoCivil", suppressMenu: true },
      { headerName: "Tipo de Sangre", field: "tipoSangre", suppressMenu: true },
      { headerName: "Nacionalidad", field: "nacionalidad", suppressMenu: true },
    ],
    defaultColDef: {
      editable: true,
      filter: "agTextColumnFilter",
      filterParams: {
        filterOptions: ["contains"],
        defaultFilterOption: "contains",
        suppressAndOrCondition: true,
      },
      floatingFilter: true,
    },
  });

  function handleCellClicked(params) {
    if (
      params.column.colId === "acciones" &&
      params.event.target.dataset.action
    ) {
      const action = params.event.target.dataset.action;

      if (action === "edit") {
        params.api.startEditingCell({
          rowIndex: params.node.rowIndex,
          colKey: "cedula", // Puedes especificar la columna que deseas editar aquí
        });
      }

      if (action === "delete") {
        /* params.api.applyTransaction({
          remove: [params.node.data],
        }); */
      }

      if (action === "update") {
        params.api.stopEditing(false);
      }

      if (action === "cancel") {
        params.api.stopEditing(true);
      }
    }
  }

  function handleRowEditingStarted(params) {
    params.api.refreshCells({
      columns: ["acciones"],
      rowNodes: [params.node],
      force: true,
    });
  }

  function handleRowEditingStopped(params) {
    params.api.refreshCells({
      columns: ["acciones"],
      rowNodes: [params.node],
      force: true,
    });
  }

  return (
    <div className="ag-theme-quartz" style={{ width: "100%", height: "90%" }}>
      <AgGridReact
        pagination={true}
        gridOptions={gridOptions}
        rowData={rowData}
        rowSelection="multiple"
        domLayout='autoHeight'
      />
    </div>
  );
};

export default TableEmpleados;
