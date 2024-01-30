/*import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";

const TableCapacitaciones = ({ capacitaciones }) => {
  const [rowData, setRowData] = useState([]);

  // Column Definitions: Defines & controls grid columns.
  const [colDefs] = useState([
    { headerName: "Cedula", field: "cedula" },
    {
      headerName: "Nombre Completo",
      valueGetter: (params) =>
        `${params.data.primerNombre} ${params.data.segundoNombre} ${params.data.primerApellido} ${params.data.segundoApellido}`,
    },
    { headerName: "Capacitación", field: "nombre" },
    { headerName: "Descripción", field: "descripcion" },
    { headerName: "Tipo de Evento", field: "tipoEvento" },
    { headerName: "Institución", field: "institucion" },
    { headerName: "Cantidad de Horas", field: "cantidadHoras" },
    { headerName: "Fecha", field: "fecha" },
    // Agrega más columnas según sea necesario
  ]);

  // Fetch data & update rowData state
  useEffect(() => {
    setRowData(capacitaciones);
  }, [capacitaciones]);

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

  const onFirstDataRendered = useCallback(
    (params) => {
      params.api.createRangeChart({
        chartContainer: document.querySelector("#myChart"),
        cellRange: {
          rowStartIndex: 0,
          rowEndIndex: rowData.length - 1,
          columns: ["nombre", "descripcion"], // Ajusta las columnas según tus datos
        },
        chartType: "groupedColumn",
        aggFunc: "sum",
      });
    },
    [rowData]
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
          onFirstDataRendered={onFirstDataRendered}
          rowSelection={"multiple"}
        />
      </div>
      <div id="myChart" className="ag-theme-quartz my-chart"></div>
    </div>
  );
};

export default TableCapacitaciones;*/
import React, { useEffect, useState } from "react";
import { AgGridReact } from "ag-grid-react";
import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-alpine.css";

import OptionsRenderer from "./OptionsRenderer";

const TableCapacitaciones = ({ capacitaciones }) => {
  const [rowData, setRowData] = useState([]);

  useEffect(() => {
    setRowData(capacitaciones);
  }, [capacitaciones]);

  const [gridOptions] = useState({
    suppressClickEdit: true,
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
      },
      {
        headerName: "Nombre Completo",
        suppressMenu: true,
        valueGetter: (params) =>
          `${params.data.primerNombre} ${params.data.segundoNombre} ${params.data.primerApellido} ${params.data.segundoApellido}`,
      },
      { headerName: "Capacitación", field: "nombre" },
      { headerName: "Descripción", field: "descripcion" },
      { headerName: "Tipo de Evento", field: "tipoEvento" },
      { headerName: "Institución", field: "institucion" },
      { headerName: "Cantidad de Horas", field: "cantidadHoras" },
      { headerName: "Fecha", field: "fecha", filter: "agDateColumnFilter", suppressMenu: true,}, 
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
        params.api.applyTransaction({
          remove: [params.node.data],
        });
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
      />
    </div>
  );
 
};

export default TableCapacitaciones;